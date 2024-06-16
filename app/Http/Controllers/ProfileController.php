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
    //Show Profile
    public function showProfile(Request $request, User $user)
    {
        // $user = Auth::user();
        // return view('profile', compact('user'));

        $user = User::find($user->id);
        // dd($user);
        //return view('profile', ['user' => $user]);
        return view('profile');
    }

    //Edit Profile
    public function editProfile()
    {
        return view('profileEdit');
    }

    //update profile
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // Validasi permintaan
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => ['nullable', 'confirmed', 'min:8'],
        ]);

        // Perbarui informasi pengguna
        $user->nama = $request->nama; // Ubah 'name' menjadi 'nama'
        $user->email = $request->email;

        // Perbarui password jika diberikan
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('profile.edit')->with('success', 'Profil berhasil diperbarui.');
    }
    
}
