<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agama;
use App\Models\Buku;
use App\Models\Peminjam;
use Barryvdh\DomPDF\Facade\Pdf;

class PeminjamController extends Controller
{
    // Menampilkan halaman form untuk menambahkan data peminjam
    public function index()
    {
    // Mengambil semua data agama untuk dropdown agama
    $agama = Agama::all();

    // Mengambil semua data buku untuk dropdown buku
    $buku = Buku::all();

    // Mengarahkan ke view 'peminjam.create' dengan data agama dan buku
    return view('peminjam.create', compact('agama', 'buku'));
    }

    public function create()
    {
        $agama = Agama::all();  // Ambil semua data agama
        $buku = Buku::all();    // Ambil semua data buku

        return view('peminjam.create', compact('agama', 'buku'));
    }


    // Menyimpan data peminjam baru ke dalam database
    public function store(Request $request)
    {
        $buku = Buku::all();
        // Validasi input dari form untuk memastikan data valid
        $request->validate([
            'buku_id' => 'required|exists:buku,id',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:peminjams,email',
            'tanggal_lahir' => 'required|date',
            'nomor_telepon' => 'required|string|max:15',
            'agama' => 'required|string',
            'alamat' => 'required|string',
        ]);

        // Menyimpan data ke dalam tabel peminjams
        Peminjam::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_hp' => $request->no_hp,
            'id_agama' => $request->agama,
            'buku_id' => $request->buku,
            'alamat' => $request->alamat,
        ]);


        $buku = Buku::all(); // Ambil semua data buku
        return view('peminjam.create', compact('buku'));

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
