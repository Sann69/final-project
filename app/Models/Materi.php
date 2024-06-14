<?php

// app/Models/Materi.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $table = 'materis'; // Sesuaikan dengan nama tabel di database

    protected $fillable = [
        'judul', 'deskripsi', 'file', 'author',
    ];
}

