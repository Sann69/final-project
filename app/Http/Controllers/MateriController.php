<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

// Materi Controller

use App\Models\Materi; // Import model Materi

class MateriController extends Controller
{
    // Menampilkan daftar materi
    public function index(Request $request)
    {
        $materi = Materi::all(); // Mengambil semua data materi dari database
        return view('materi.index', compact('materi')); // Menampilkan halaman daftar materi dengan data materi
    }

    // Menampilkan detail materi
    public function show($id)
    {
        $materi = Materi::findOrFail($id); // Mengambil data materi berdasarkan ID
        return view('materi.detail', compact('materi')); // Menampilkan halaman detail materi dengan data materi yang dipilih
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        // Lakukan logika pencarian di sini, misalnya:
        $materi = Materi::where('title', 'LIKE', "%$query%")->get();
        
        return view('materi.index', compact('materi'));
    }
}
