<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Penulis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Menu</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="/penulis">Penulis</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/buku">Buku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/peminjam">Peminjam</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Logo Section -->
    <div class="text-center my-3">
        <img src="https://upload.wikimedia.org/wikipedia/commons/4/49/Gambar_Buku.png" alt="Logo" class="img-fluid" style="max-height: 100px;">
    </div>
    <div class="container">
        <h2>Data Buku</h2>
        @if (Session::has('pesan'))
            <div class="alert alert-success">
                {{ Session::get('pesan') }}
            </div>
        @endif
        <a href="{{ route('buku.create') }}" class="btn btn-primary mb-3">Tambah Buku</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Penulis</th>
                    <th>Judul</th>
                    <th>Tanggal Terbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $buku)
                    <tr>
                        <td>{{ $buku->id }}</td>
                        <td>{{ $buku->penulis->nama }}</td>
                        <td>{{ $buku->judul }}</td>
                        <td>{{ $buku->published_date }}</td>
                        <td>
                            <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        new DataTable('.datatable'); // menggunakan class
    </script>
</body>

</html>
