<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Peminjam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Arial', sans-serif;
        }

        .navbar {
            background-color: #007bff;
        }

        .navbar-brand,
        .nav-link {
            color: white !important;
        }

        .navbar-nav .nav-link {
            margin-right: 15px;
        }

        .container {
            max-width: 900px;
            margin-top: 5px;
        }

        .card {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .form-label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 12px 25px;
            font-size: 16px;
            border-radius: 30px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .alert {
            margin-top: 20px;
            border-radius: 10px;
        }

        .footer {
            text-align: center;
            margin-top: 50px;
            font-size: 14px;
            color: #777;
        }

        .footer a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/peminjam">Peminjam</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0">Form Peminjam</h4>
                    </div>
                    <div class="card-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif

                        <form action="{{ route('peminjam.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="buku"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Buku</label>
                                <select id="buku" name="buku"
                                    class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    required>
                                    <option value="" disabled selected>Pilih Buku</option>
                                    @foreach ($buku as $d)
                                        <option value="{{ $d->id }}" {{ old('buku') == $d->id ? 'selected' : '' }}>
                                            {{ $d->judul }}
                                            <!-- Pastikan ini sesuai dengan kolom nama buku di database -->
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama Anda" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email Anda" required>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                            </div>
                            <div class="mb-3">
                                <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                                <input type="text" name="nomor_telepon" id="nomor_telepon" class="form-control" placeholder="Masukkan nomor telepon" required>
                            </div>
                            <div class="mb-3">
                                <label for="agama" class="form-label">Agama</label>
                                <select name="agama" id="agama" class="form-control" required>
                                    <option value="" disabled selected>Pilih Agama</option>
                                    @foreach ($agama as $a)
                                        <option value="{{ $a->nama }}">{{ $a->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea name="alamat" id="alamat" rows="3" class="form-control" placeholder="Masukkan alamat Anda" required></textarea>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="footer">
                    <p>Hak Cipta &copy; 2025 - Dibuat dengan <span style="color: red;">&#9829;</span> oleh Tim Developer. <a href="#">Hubungi Kami</a></p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
