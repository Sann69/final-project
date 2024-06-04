<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
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
            return redirect()->route('login_page')
                ->withErrors($validator)
                ->withInput();
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();

            $user = Auth::user();
            if ($user->hasRole('admin')) {
                return redirect()->route('home_page', ['user' => $user->id]);
            } elseif ($user->hasRole('user')) {
                return redirect()->route('home_page');
            }
        } else {
            return redirect()->route('login_page')
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
            return redirect()->route('register_page')
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
            return redirect()->route('register_page')
                ->with('success', 'User created successfully');
        } else {
            return redirect()->route('register_page')
                ->with('error', 'Failed to create user');
        }
    }

    //proses logout
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login_page');
    }

}