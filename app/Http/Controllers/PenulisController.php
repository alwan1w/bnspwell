<?php

namespace App\Http\Controllers;

use App\Models\Penulis; // Menggunakan model Penulis
use Illuminate\Http\Request;

class PenulisController extends Controller
{
    // Menampilkan daftar data penulis
    public function index()
    {
        // Mengambil semua data dari tabel penulis
        $data = Penulis::get();

        // Menghitung jumlah data penulis
        $count = $data->count();

        // Mengirim data penulis dan jumlah data ke view 'penulis.index'
        return view('penulis.index', compact('data', 'count'));
    }

    // Menampilkan halaman untuk menambahkan data penulis baru
    public function create()
    {
        // Mengarahkan ke view 'penulis.create'
        return view('penulis.create');
    }

    // Menyimpan data penulis baru ke database
    public function store(Request $request)
    {
        // Validasi input: nama wajib diisi dan harus berupa string
        $validated = $request->validate([
            'nama' => 'required|string',
        ]);

        // Membuat instance baru dari model Penulis
        $penulis = new Penulis();

        // Mengisi atribut nama dari input form
        $penulis->nama = $request->nama;

        // Menyimpan data ke dalam database
        $penulis->save();

        // Redirect ke halaman index dengan pesan berhasil
        return redirect('/penulis')->with('pesan', 'Data berhasil disimpan');
    }

    // Menampilkan halaman edit untuk data penulis tertentu
    public function edit($id)
    {
        // Mencari data penulis berdasarkan ID
        $penulis = Penulis::find($id);

        // Mengarahkan ke view 'penulis.edit' dengan data penulis
        return view('penulis.edit', compact('penulis'));
    }

    // Memperbarui data penulis di database
    public function update(Request $request, $id)
    {
        // Validasi input: nama wajib diisi dan harus berupa string
        $validated = $request->validate([
            'nama' => 'required|string',
        ]);

        // Mencari data penulis berdasarkan ID
        $penulis = Penulis::find($id);

        // Mengupdate nama penulis dengan input baru
        $penulis->nama = $request->input('nama');

        // Menyimpan perubahan ke database
        $penulis->save();

        // Redirect ke halaman index dengan pesan berhasil diperbarui
        return redirect('/penulis')->with('pesan', 'Item updated successfully');
    }

    // Menghapus data penulis berdasarkan ID
    public function destroy($id)
    {
        // Mencari data penulis berdasarkan ID
        $penulis = Penulis::find($id);

        // Menghapus data penulis dari database
        $penulis->delete();

        // Redirect ke halaman index
        return redirect('/penulis');
    }
}
