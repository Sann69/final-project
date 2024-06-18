<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Path gambar default
        $defaultProfilePicture = 'images/profile.png';
        
        // Path tujuan di storage
        $storagePath = 'profile_pictures/' . uniqid() . '.png';
        
        // Salin file gambar ke storage
        if (file_exists(public_path($defaultProfilePicture))) {
            Storage::disk('public')->put($storagePath, file_get_contents(public_path($defaultProfilePicture)));
        } else {
            throw new \Exception('Default profile picture not found.');
        }

        // Buat pengguna admin
        $admin = User::create([
            'nama' => 'Admin',
            'email' => 'adminkelompok2@gmail.com',
            'password' => Hash::make('admin123'),
            'gender' => 'male',
            'umur' => 30, 
            'tgl_lahir' => '1993-01-01', 
            'alamat' => 'Jakarta',
            'profile_picture' => $storagePath,
        ]);

        // Tetapkan peran admin
        $admin->assignRole('admin');
    }
}
