<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;

class MateriController extends Controller
{

    //materi
    public function showMateri()
    {
        return view('materi.materi');
    }

    //search materi
    public function search(Request $request)
    {
        $query = $request->input('query');
        // Lakukan logika pencarian di sini, misalnya:
        $materi = Materi::where('title', 'LIKE', "%$query%")->get();
        
        return view('materi.index', compact('materi'));
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
            'author' => 'required|string|max:255',
        ]);

        // Upload file
        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads', $fileName);

        // Simpan data ke database
        $materi = new Materi();
        $materi->judul = $request->judul;
        $materi->deskripsi = $request->deskripsi;
        $materi->file = $filePath; // simpan path file yang diupload
        $materi->author = $request->author;
        $materi->save();

        return redirect()->route('materi.create')->with('success', 'Materi berhasil ditambahkan!');
    }

    
}
