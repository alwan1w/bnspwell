<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Mengimpor trait HasFactory untuk mendukung factory
use Illuminate\Database\Eloquent\Model; // Mengimpor kelas Model dari Laravel
use Illuminate\Database\Eloquent\SoftDeletes; // Mengimpor trait SoftDeletes untuk mendukung penghapusan lunak

class Penulis extends Model
{
    use HasFactory; // Menggunakan trait HasFactory untuk mendukung factory
    use SoftDeletes; // Menggunakan trait SoftDeletes untuk penghapusan lunak (soft delete)
}
