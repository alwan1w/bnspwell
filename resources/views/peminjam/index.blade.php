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
        <h2>Data Peminjam</h2>
        @if (Session::has('pesan'))
            <div class="alert alert-success">
                {{ Session::get('pesan') }}
            </div>
        @endif
        <a href="{{ route('peminjam.create') }}" class="btn btn-primary mb-3">Tambah Peminjam</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Nomor Telepon</th>
                    <th>Agama</th>
                    <th>Alamat</th>
                    <th>Tanggal Lahir</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $peminjam)
                    <tr>
                        <td>{{ $peminjam->id }}</td>
                        <td>{{ $peminjam->nama }}</td>
                        <td>{{ $peminjam->email }}</td>
                        <td>{{ $peminjam->nomor_telepon }}</td>
                        <td>{{ $peminjam->agama }}</td>
                        <td>{{ $peminjam->alamat }}</td>
                        <td>{{ $peminjam->tanggal_lahir }}</td>
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
