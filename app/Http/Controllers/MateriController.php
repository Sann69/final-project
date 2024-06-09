<?php

// Materi Controller

use App\Models\Materi; // Import model Materi

class MateriController extends Controller
{
    // Menampilkan daftar materi
    public function index()
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
}
