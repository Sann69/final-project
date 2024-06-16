<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Materi;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;

class CatatanController extends Controller
{
     //catatan
    public function showCatatan(User $user)
    {
        return view('catatan.catatan' , ['user' => $user]);
    }

     //form create catatan
    public function createCatatan(User $user){
        return view('catatan.create', ['user' => $user]);
    }

    public function storeCatatan(Request $request)
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
