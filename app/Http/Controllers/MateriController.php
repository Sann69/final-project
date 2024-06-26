<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class MateriController extends Controller
{
    public function showMateri()
{
    $materi = Materi::paginate(9); // Adjust the number as needed
    return view('materi.materi', compact('materi'));
}

public function search(Request $request)
{
    $query = $request->input('query');
    $materi = Materi::where('judul', 'LIKE', "%$query%")->paginate(9);
    
    return view('materi.materi', compact('materi'));
}

    public function create()
    {
        return view('materi.create');
    }

    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'judul' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'file' => 'required|file|mimes:pdf,doc,docx,pptx,png,jpg,jpeg,zip,rar|max:10240',
        'gambar' => 'required|string|max:255',
    ]);

    // Upload file
    $file = $request->file('file');
    $fileName = time() . '_' . $file->getClientOriginalName();
    $filePath = $file->storeAs('materi_files', $fileName);

    // Simpan data ke database
    $materi = new Materi();
    $materi->judul = $request->judul;
    $materi->deskripsi = $request->deskripsi;
    $materi->file = $filePath;
    $materi->gambar = $request->gambar;
    $materi->user_id = $request->user()->id; // assuming the user is authenticated
    $materi->save();

    return redirect()->route('materi.create')->with('success', 'Materi berhasil ditambahkan!');
}


    public function detail($id)
{
    $materi = Materi::findOrFail($id);
    return view('materi.detail', compact('materi'));
}

public function download($id)
{
    $materi = Materi::findOrFail($id);
    $filePath = storage_path('app/' . $materi->file);

    if (file_exists($filePath)) {
        return response()->download($filePath);
    } else {
        return redirect()->back()->with('error', 'File tidak ditemukan.');
    }
}


public function destroy($id)
{
    $materi = Materi::findOrFail($id);

    // Cek apakah pengguna yang sedang login adalah admin atau pemilik materi
    if (!Auth::user()->hasRole('admin') && $materi->user_id != Auth::id()) {
        return redirect()->route('materi.show')->with('error', 'Anda tidak memiliki izin untuk menghapus materi ini.');
    }

    // Hapus file dari storage jika ada
    if ($materi->file && Storage::exists($materi->file)) {
        Storage::delete($materi->file);
    }

    // Hapus materi dari database
    $materi->delete();

    return redirect()->route('materi.show')->with('success', 'Materi berhasil dihapus.');
}


public function edit($id)
{
    $materi = Materi::findOrFail($id);
    return view('materi.edit', compact('materi'));
}

public function update(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'judul' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'gambar' => 'required|string|max:255',
    ]);

    // Update data ke database
    $materi = Materi::findOrFail($id);
    $materi->judul = $request->judul;
    $materi->deskripsi = $request->deskripsi;
    $materi->gambar = $request->gambar;
    $materi->save();

    return redirect()->route('materi.show')->with('success', 'Materi berhasil diupdate!');
}



}
