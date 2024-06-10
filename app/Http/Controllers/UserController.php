<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
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

        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'umur' => $request->umur,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
        ]);

        // default role -> user (admin/user)
        $user->assignRole('user');

        if ($user) {
            return redirect()->route('register.page')
                ->with('success', 'User created successfully');
        } else {
            return redirect()->route('register.page')
                ->with('error', 'Failed to create user');
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
        $user = Socialite::driver('google')->user();

        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            Auth::login($existingUser);
        } else {
            $newUser = new User();
            $newUser->google_id = $user->id;
            $newUser->nama = $user->name;
            $newUser->email = $user->email;
            $newUser->password = Hash::make(Str::random(15));
            $newUser->gender = 'male';
            $newUser->umur = 25;
            $newUser->tgl_lahir = '1996-05-13';
            $newUser->alamat = 'Jakarta Selatan';
            $newUser->save();

            // assign role
            $newUser->assignRole('user');

            Auth::login($newUser);
        }

        return redirect()->route('home.page');
    }

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

    // bookmark
    public function showBookmark()
    {
        return view('bookmark');
    }

    //catatan
    public function showCatatan()
    {
        return view('catatan');
    }

    //materi
    public function showMateri()
    {
        return view('materi');
    }

     //tentang
    public function showTentang()
    {
        return view('tentang');
    }

    // Upload file
    public function showUploadForm()
    {
        return view('profile.upload');
    }

    // Method to handle file upload
    public function uploadFile(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        $fileName = time() . '_' . $request->file->getClientOriginalName();
        $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

        return redirect()->route('profile.upload')->with('success', 'File uploaded successfully.');
    }

    // public function getProfile(Request $request, User $user)
    // {
    //     $user = User::with('summarize')->find($user->id);
    //     // dd($user);
    //     return view('profile', ['user' => $user]);
    // }

}