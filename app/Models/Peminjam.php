<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Mengimpor trait HasFactory untuk mendukung factory
use Illuminate\Database\Eloquent\Model; // Mengimpor kelas Model dari Laravel

class Peminjam extends Model
{
    use HasFactory; // Menggunakan trait HasFactory untuk mendukung fitur factory pada model ini

    // Menentukan nama tabel yang direpresentasikan oleh model
    protected $table = 'peminjams';

    // Menentukan atribut yang dapat diisi secara massal (mass assignment)
    protected $fillable = [
        'buku_id',
        'nama',           // Nama lengkap peminjam
        'email',          // Email peminjam
        'tanggal_lahir',  // Tanggal lahir peminjam
        'nomor_telepon',  // Nomor telepon peminjam
        'agama',          // Agama peminjam
        'alamat',         // Alamat peminjam
    ];

    public function buku()
    {
    return $this->belongsTo(Buku::class, 'buku_id');
    }
}
