<?php
// app/Models/MataPelajaran.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'file_url'
    ];

    // Jika ada relasi dengan tabel lain, misalnya Materi
    public function materi()
    {
        return $this->hasMany(Materi::class);
    }
}
