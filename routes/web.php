<?php

use App\Http\Controllers\CatatanController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\ProfileController;

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
Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile.show')->middleware('authenticate');
Route::get('/profile/edit', [ProfileController::class, 'editProfile'])->name('profile.edit')->middleware('authenticate');
Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update')->middleware('authenticate');
//Route::get('/home', [ProfileController::class, 'index'])->name('home');

// Catatan
Route::get('/catatan', [CatatanController::class, 'showCatatan'])->name('catatan.show')->middleware('authenticate');
Route::get('/catatan/my', [CatatanController::class, 'showCatatanSaya'])->name('catatanSaya.show')->middleware('authenticate');
Route::get('/catatan/create', [CatatanController::class, 'createCatatan'])->name('catatan.create')->middleware('authenticate');
Route::post('/catatan/store', [CatatanController::class, 'storeCatatan'])->name('catatan.store')->middleware('authenticate');
Route::get('/catatan/search', [CatatanController::class, 'search'])->name('catatan.search')->middleware('authenticate');
Route::get('/catatan/{id}/download', [CatatanController::class, 'download'])->name('catatan.download')->middleware('authenticate');
Route::delete('/catatan/{id}', [CatatanController::class, 'destroy'])->name('catatan.destroy')->middleware('authenticate');
Route::get('/catatan/{id}/edit', [CatatanController::class, 'edit'])->name('catatan.edit')->middleware('authenticate');
Route::put('/catatan/{id}/update', [CatatanController::class, 'update'])->name('catatan.update')->middleware('authenticate');

// Materi
Route::get('/materi', [MateriController::class, 'showMateri'])->name('materi.show')->middleware('authenticate');
Route::get('/materi/search', [MateriController::class, 'search'])->name('materi.search')->middleware('authenticate');
Route::get('/materi/create', [MateriController::class, 'create'])->name('materi.create')->middleware('authenticate');
Route::post('/materi', [MateriController::class, 'store'])->name('materi.store')->middleware('authenticate');
Route::get('/materi/download/{id}', [MateriController::class, 'download'])->name('materi.download')->middleware('authenticate');
Route::delete('/materi/{id}', [MateriController::class, 'destroy'])->name('materi.destroy')->middleware('authenticate');
Route::get('/materi/{id}/edit', [MateriController::class, 'edit'])->name('materi.edit')->middleware('authenticate');
Route::put('/materi/{id}/update', [MateriController::class, 'update'])->name('materi.update')->middleware('authenticate');


// Tentang
Route::get('/tentang', [UserController::class, 'showTentang'])->name('tentang.page');

//admin
//Route::get('/admin/{user}', [UserController::class, 'getAdmin'])->name('admin.page')->middleware('authenticate');
Route::get('/admin', [UserController::class, 'getAdmin'])->name('admin.page')->middleware(['authenticate', 'role:admin']);
Route::get('/edit/{user}', [UserController::class, 'editUserAdmin'])->name('edit.user.admin')->middleware('authenticate');
Route::put('/edit/{user}', [UserController::class, 'updateUserAdmin'])->name('update.user')->middleware('authenticate');
Route::delete('/delete/{user}', [UserController::class, 'deleteUserAdmin'])->name('delete.user')->middleware('authenticate');



