<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Login
Route::get('/login', [UserController::class, 'login'])->name('login_page');
Route::post('/login', [UserController::class, 'loginUser'])->name('login_user');

// Register
Route::get('/register', [UserController::class, 'register'])->name('register_page');
Route::post('/register-user', [UserController::class, 'registerUser'])->name('register_user');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

// Socialite Google Login
Route::get('/login/google', [UserController::class, 'loginGoogle'])->name('login_google');
Route::get('/login/google/callback', [UserController::class, 'loginGoogleCallback'])->name('callback_google');

// Home
Route::get('/', [UserController::class, 'home'])->name('home_page');

// Profile
Route::get('/profile', [UserController::class, 'showProfile'])->name('profile.show');
Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');
Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');

// bookmark
Route::get('/bookmark', [UserController::class, 'showBookmark'])->name('bookmark.show');

// catatan
Route::get('/catatan', [UserController::class, 'showCatatan'])->name('catatan.show');

// materi
Route::get('/materi', [UserController::class, 'showMateri'])->name('materi.show');
