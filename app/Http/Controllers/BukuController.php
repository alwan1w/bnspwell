<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Penulis;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    // Menampilkan daftar buku beserta informasi penulisnya
    public function index()
    {
        // Mengambil semua data buku beserta relasi penulis
        $data = Buku::with('penulis')->get();

        // Mengarahkan ke view 'buku.index' dan mengirimkan data buku
        return view('buku.index', compact('data'));
    }

    // Menampilkan halaman untuk menambah buku baru
    public function create()
    {
        // Mengambil semua data penulis untuk dropdown pemilihan penulis
        $penulis = Penulis::all();

        // Mengarahkan ke view 'buku.create' dan mengirimkan data penulis
        return view('buku.create', compact('penulis'));

        $buku = Buku::all(); // Ambil semua data buku
        return view('peminjam.create', compact('buku'));
    }

    // Menyimpan data buku baru ke dalam database
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'penulis_id' => 'required|exists:penulis,id', // ID penulis harus ada di tabel penulis
            'judul' => 'required|string|max:255',       // Judul buku wajib diisi dengan maksimal 255 karakter
            'published_date' => 'required|date',       // Tanggal terbit harus berupa tanggal yang valid
        ]);

        // Menyimpan data buku ke database
        Buku::create($request->all());

        // Redirect ke halaman daftar buku dengan pesan sukses
        return redirect()->route('buku.index')->with('pesan', 'Buku berhasil ditambahkan.');
    }

    // Menampilkan halaman untuk mengedit buku berdasarkan ID
    public function edit($id)
    {
        // Mencari buku berdasarkan ID (jika tidak ditemukan akan menghasilkan error 404)
        $buku = Buku::findOrFail($id);

        // Mengambil semua data penulis untuk dropdown pemilihan penulis
        $penulis = Penulis::all();

        // Mengarahkan ke view 'buku.edit' dengan data buku dan penulis
        return view('buku.edit', compact('buku', 'penulis'));
    }

    // Memperbarui data buku yang sudah ada di database
    public function update(Request $request, $id)
    {
        // Validasi input dari form
        $request->validate([
            'penulis_id' => 'required|exists:penulis,id', // ID penulis harus ada di tabel penulis
            'judul' => 'required|string|max:255',       // Judul buku wajib diisi dengan maksimal 255 karakter
            'published_date' => 'required|date',       // Tanggal terbit harus berupa tanggal yang valid
        ]);

        // Mencari buku berdasarkan ID (jika tidak ditemukan akan menghasilkan error 404)
        $buku = Buku::findOrFail($id);

        // Memperbarui data buku di database
        $buku->update($request->all());

        // Redirect ke halaman daftar buku dengan pesan sukses
        return redirect()->route('buku.index')->with('pesan', 'Buku berhasil diupdate.');
    }

    // Menghapus buku dari database berdasarkan ID
    public function destroy($id)
    {
        // Mencari buku berdasarkan ID dan menghapusnya (jika tidak ditemukan akan menghasilkan error 404)
        Buku::findOrFail($id)->delete();

        // Redirect ke halaman daftar buku dengan pesan sukses
        return redirect()->route('buku.index')->with('pesan', 'Buku berhasil dihapus.');
    }
}
