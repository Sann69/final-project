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

class UserController extends Controller
{

    public function callSession(Request $request)
    {
        return redirect()->back()->with('status', 'Berhasil memanggil sesi');
    }

     //halaman home
    public function home()
    {
        return view('home');
    }

    //halaman login
    public function login()
    {
        return view('login');
    }

    //proses login
    public function loginUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('login.page')
                ->withErrors($validator)
                ->withInput();
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();

            $user = Auth::user();
            if ($user->hasRole('admin')) {
                return redirect()->route('home.page', ['user' => $user->id]);
            } elseif ($user->hasRole('user')) {
                return redirect()->route('home.page');
            }
        } else {
            return redirect()->route('login.page')
                ->with('error', 'Login failed, email or password is incorrect');
        }
    }

    //halaman register
    public function register()
    {
        return view('register');
    }

    //proses register
    public function registerUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'gender' => 'required|in:male,female',
            'umur' => 'required|integer|min:1',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('register.page')
                ->withErrors($validator)
                ->withInput();
        }
    
        // Path gambar default
        $defaultProfilePicture = 'images/profile.png';
    
        // Path tujuan di storage
        $storagePath = 'profile_pictures/' . uniqid() . '.png';
    
        // Salin file gambar ke storage
        if (file_exists(public_path($defaultProfilePicture))) {
            Storage::disk('public')->put($storagePath, file_get_contents(public_path($defaultProfilePicture)));
        } else {
            return redirect()->route('register.page')->with('error', 'Default profile picture not found.');
        }
    
        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'umur' => $request->umur,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'profile_picture' => $storagePath,
        ]);
    
        // Default role -> user (admin/user)
        $user->assignRole('user');
    
        if ($user) {
            return redirect()->route('register.page')->with('success', 'User created successfully');
        } else {
            return redirect()->route('register.page')->with('error', 'Failed to create user');
        }
    }
    

    //proses logout
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login.page');
    }

    //login google
    public function loginGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    //proses login google
    public function loginGoogleCallback()
{
    try {
        $user = Socialite::driver('google')->user();
    } catch (\Exception $e) {
        return redirect()->route('login')->with('error', 'Google login failed: ' . $e->getMessage());
    }

    // Cari pengguna yang sudah terdaftar berdasarkan email
    $existingUser = User::where('email', $user->email)->first();

    if ($existingUser) {
        // Jika pengguna sudah ada, langsung login
        Auth::login($existingUser);
    } else {
        // Jika pengguna belum terdaftar, buat pengguna baru
        $newUser = new User();
        $newUser->google_id = $user->id; // Simpan ID Google jika diperlukan
        $newUser->nama = $user->name;
        $newUser->email = $user->email;
        $newUser->password = Hash::make(Str::random(15));
        $newUser->gender = 'male'; 
        $newUser->umur = 25; 
        $newUser->tgl_lahir = '1996-05-13'; 
        $newUser->alamat = 'Jakarta Selatan';
        
        // Simpan gambar profil dari Google ke penyimpanan
        $profilePictureUrl = $user->avatar;
        if ($profilePictureUrl) {
            $extension = pathinfo($profilePictureUrl, PATHINFO_EXTENSION);
            $fileName = 'profile_picture_' . $newUser->id . '.' . $extension;
            $storagePath = 'profile_pictures/' . $fileName;

            // Download gambar dari URL dan simpan di storage
            $imageContents = file_get_contents($profilePictureUrl);
            Storage::disk('public')->put($storagePath, $imageContents);

            $newUser->profile_picture = $storagePath;
        }

        $newUser->save();

        // Assign role
        $newUser->assignRole('user');

        // Login pengguna baru
        Auth::login($newUser);
    }

    return redirect()->route('home.page');
}

     //tentang
    public function showTentang()
    {
        return view('tentang');
    }

    //halaman admin
    public function getAdmin()
    {
        $users = User::all();
        return view('admin.adminPage', ['users' => $users]);
    }

    //form edit user pada halaman admin
    public function editUserAdmin(User $user)
        {
            return view('admin.editUserAdmin', ['user' => $user]);
        }

    //proses edit user pada halaman admin
    public function updateUserAdmin(Request $request, User $user)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        'gender' => 'required|in:male,female',
        'umur' => 'required|integer|min:0',
        'tgl_lahir' => 'required|date',
        'alamat' => 'required|string|max:500',
        'role' => 'required|string|in:admin,user',
    ]);

    $user->update([
        'nama' => $request->nama,
        'email' => $request->email,
        'gender' => $request->gender,
        'umur' => $request->umur,
        'tgl_lahir' => $request->tgl_lahir,
        'alamat' => $request->alamat,
    ]);

    // Update role
    $user->syncRoles($request->role);

    return redirect()->route('update.user', $user->id)->with('success', 'User updated successfully');
}

    //fungsi delete user pada halaman admin
    public function deleteUserAdmin(User $user)
    {
        $user->delete();
        return redirect()->route('admin.page')->with('success', 'User deleted successfully');
    }

}