<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Catatan;

class CatatanController extends Controller
{
    public function showCatatan(Request $request)
    {
        // Menggunakan paginate untuk membatasi jumlah catatan per halaman
        $catatan = Catatan::paginate(9); // Sesuaikan jumlah paginasi sesuai kebutuhan
        return view('catatan.catatan', compact('catatan'));
    }

    public function showCatatanSaya(Request $request)
    {
        // Menggunakan paginate untuk membatasi jumlah catatan per halaman
        $catatan = Catatan::where('user_id', Auth::id())->paginate(9);
        return view('catatan.catatan', compact('catatan'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $catatan = Catatan::where('judul', 'LIKE', "%$query%")->paginate(10); // Sesuaikan jumlah paginasi sesuai kebutuhan
        return view('catatan.catatan', compact('catatan'));
    }

    public function createCatatan()
    {
        return view('catatan.create');
    }

    public function storeCatatan(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'file' => 'required|mimes:pdf,doc,docx,pptx,png,jpg,jpeg|max:10240', // Maksimum 10MB
        ]);

        // Simpan file di direktori storage/app/public/catatan_files
        $filePath = $request->file('file')->store('public/catatan_files');

        // Dapatkan nama file yang disimpan
        $fileName = basename($filePath);

        Catatan::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file' => $fileName, // Simpan hanya nama file, bukan path lengkap
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('catatan.show')->with('success', 'Catatan berhasil ditambahkan!');
    }

    public function showDetail($id)
    {
        // Hanya menampilkan detail catatan yang dimiliki oleh user yang sedang login
        $catatan = Catatan::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('catatan.detail', compact('catatan'));
    }

    public function download($id)
{
    $catatan = Catatan::findOrFail($id);
    $filePath = storage_path('app/public/catatan_files/' . $catatan->file);

    if (file_exists($filePath)) {
        return response()->download($filePath);
    } else {
        return redirect()->back()->with('error', 'File tidak ditemukan.');
    }
}
}
