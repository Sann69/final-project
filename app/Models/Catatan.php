<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catatan extends Model
{
    use HasFactory;
    protected $table = 'catatan'; // Sesuaikan dengan nama tabel di database

    protected $fillable = [
        'judul', 'deskripsi', 'file' , 'user_id',
    ];
}
