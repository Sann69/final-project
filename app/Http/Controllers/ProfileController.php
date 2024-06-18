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

class ProfileController extends Controller
{

    public function showProfile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    //Edit Profile
    public function editProfile()
    {
        return view('profileEdit');
    }


    //UpdateProfile
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // Validasi permintaan
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'gender' => 'required|in:male,female',
            'umur' => 'required|integer|min:0',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'password' => 'nullable|confirmed|min:8',
        ]);

        // Perbarui informasi pengguna
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->umur = $request->umur;
        $user->tgl_lahir = $request->tgl_lahir;
        $user->alamat = $request->alamat;

        // Perbarui password jika diberikan
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Perbarui gambar profil jika diberikan
        if ($request->hasFile('profile_picture')) {
            // Hapus gambar lama jika ada
            if ($user->profile_picture && Storage::exists('public/' . $user->profile_picture)) {
                Storage::delete('public/' . $user->profile_picture);
            }

            // Simpan gambar baru
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $profilePicturePath;
        }

        $user->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('profile.edit')->with('success', 'Profil berhasil diperbarui.');
    }


    
}
