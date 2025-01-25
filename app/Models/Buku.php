<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Mengimpor trait untuk factory
use Illuminate\Database\Eloquent\Model; // Mengimpor kelas Model dari Laravel

class Buku extends Model
{
    use HasFactory; // Menggunakan trait HasFactory untuk mendukung fitur factory pada model ini

    // Menentukan nama tabel yang diwakili oleh model ini
    protected $table = 'buku';

    // Menentukan atribut yang dapat diisi secara massal (mass assignment)
    protected $fillable = ['penulis_id', 'judul', 'published_date'];

    /**
     * Relasi ke model Penulis
     *
     * Relasi ini menunjukkan bahwa setiap buku memiliki satu penulis (one-to-one relationship).
     * Relasi menggunakan metode `belongsTo` dengan parameter:
     * - `Penulis::class`: Model tujuan relasi
     * - `'penulis_id'`: Nama kolom foreign key di tabel buku
     */
    public function penulis()
    {
        return $this->belongsTo(Penulis::class, 'penulis_id');
    }
}
