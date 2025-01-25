<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agama;
use App\Models\Peminjam;
use Barryvdh\DomPDF\Facade\Pdf;

class PeminjamController extends Controller
{
    // Menampilkan halaman form untuk menambahkan data peminjam
    public function index()
    {
        // Mengambil semua data agama untuk digunakan dalam dropdown pada form
        $agama = Agama::all();

        // Mengarahkan ke view 'peminjam.create' dengan data agama
        return view('peminjam.create', compact('agama'));
    }

    // Menyimpan data peminjam baru ke dalam database
    public function store(Request $request)
    {
        // Validasi input dari form untuk memastikan data valid
        $request->validate([
            'nama' => 'required|string|max:255',             // Nama wajib diisi, berupa string, maksimal 255 karakter
            'email' => 'required|email|unique:peminjams,email', // Email harus valid, unik di tabel peminjams
            'tanggal_lahir' => 'required|date',             // Tanggal lahir wajib berupa tanggal valid
            'nomor_telepon' => 'required|string|max:15',    // Nomor telepon wajib, maksimal 15 karakter
            'agama' => 'required|string',                   // Agama wajib diisi
            'alamat' => 'required|string',                  // Alamat wajib diisi
        ]);

        // Menyimpan data ke dalam tabel peminjams
        $peminjam = Peminjam::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'tanggal_lahir' => $request->tanggal_lahir,
            'nomor_telepon' => $request->nomor_telepon,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
        ]);

        // Redirect ke fungsi cetak PDF dengan ID peminjam
        return redirect()->route('peminjam.cetak', $peminjam->id);
    }

    // Menghasilkan file PDF berisi data peminjam berdasarkan ID
    public function cetakPdf($id)
    {
        // Mencari data peminjam berdasarkan ID (jika tidak ditemukan akan menghasilkan error 404)
        $peminjam = Peminjam::findOrFail($id);

        // Memuat view 'peminjam.cetak' dengan data peminjam dan menghasilkan PDF
        $pdf = Pdf::loadView('peminjam.cetak', ['peminjam' => $peminjam]);

        // Mengunduh file PDF dengan nama 'invoice.pdf'
        return $pdf->download('invoice.pdf');

        // Jika hanya ingin menampilkan view (tanpa unduhan), gunakan kode berikut:
        // return view('peminjam.cetak', compact('peminjam'));
    }
}
