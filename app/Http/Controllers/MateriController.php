<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;
use Illuminate\Support\Facades\Storage;

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
        'file' => 'required|file|mimes:pdf,doc,docx',
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


}
