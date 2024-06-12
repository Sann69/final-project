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
Route::get('/login', [UserController::class, 'login'])->name('login.page');
Route::post('/login', [UserController::class, 'loginUser'])->name('login.user');

// Register
Route::get('/register', [UserController::class, 'register'])->name('register.page');
Route::post('/register-user', [UserController::class, 'registerUser'])->name('register.user');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

// Socialite Google Login
Route::get('/login/google', [UserController::class, 'loginGoogle'])->name('login.google');
Route::get('/login/google/callback', [UserController::class, 'loginGoogleCallback'])->name('callback.google');

// Home
Route::get('/', [UserController::class, 'home'])->name('home.page');

// Profile
Route::get('/profile', [UserController::class, 'showProfile'])->name('profile.show');
Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');
Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');


// Form Upload
Route::get('/profile/upload', [UserController::class, 'showUploadForm'])->name('profile.upload');
Route::post('/profile/upload', [UserController::class, 'uploadFile'])->name('profile.upload.submit');

// Bookmark
Route::get('/bookmark', [UserController::class, 'showBookmark'])->name('bookmark.show');

// Catatan
Route::get('/catatan', [UserController::class, 'showCatatan'])->name('catatan.show');

// Materi
Route::get('/materi', [UserController::class, 'showMateri'])->name('materi.show');

// Tentang
Route::get('/tentang', [UserController::class, 'showTentang'])->name('tentang.page');

// Search
Route::get('/materi/search', [UserController::class, 'search'])->name('materi.search');
Route::get('/catatan/search', [UserController::class, 'search'])->name('catatan.search');
Route::get('/bookmark/search', [UserController::class, 'search'])->name('bookmark.search');

//admin
//Route::get('/admin/{user}', [UserController::class, 'getAdmin'])->name('admin.page')->middleware('authenticate');
Route::get('/admin', [UserController::class, 'getAdmin'])->name('admin.page')->middleware(['auth', 'role:admin']);
Route::get('/edit/{user}', [UserController::class, 'editUserAdmin'])->name('edit.user.admin');
Route::put('/edit/{user}', [UserController::class, 'updateUserAdmin'])->name('update.user');
Route::delete('/delete/{user}', [UserController::class, 'deleteUserAdmin'])->name('delete.user');
