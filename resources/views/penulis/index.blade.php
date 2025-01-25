<!-- resources/views/penulis/index.blade.php -->
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
                        <a class="nav-link" href="/penulis">Penulis</a>
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

    <div class="container mt-4">
        <h2>Data Penulis</h2>
        @if (Session::has('pesan'))
            <div class="alert alert-success">
                {{ Session::get('pesan') }}
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <a href="{{ route('penulis.create') }}" class="mb-3 btn btn-primary float-end">Tambah Penulis</a>
                <table class="table table-bordered datatable">
                    <thead>
                        <tr>
                            <th width="1">ID</th>
                            <th>Nama</th>
                            <th width="1">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $penulis)
                            <tr>
                                <td>{{ $penulis->id }}</td>
                                <td>{{ $penulis->nama }}</td>
                                <td>
                                    <div class="gap-2 d-flex">
                                        <a href="{{ route('penulis.edit', $penulis->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('penulis.destroy', $penulis->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Yakin mau dihapus?')" type="submit"
                                                class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Inisialisasi DataTable
        new DataTable('.datatable');
    </script>
</body>

</html>
