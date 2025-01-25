<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Penulis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2>Edit Buku</h2>
        <form action="{{ route('buku.update', $buku->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="penulis_id" class="form-label">Penulis</label>
                <select name="penulis_id" id="penulis_id" class="form-control" required>
                    <option value="">Pilih Penulis</option>
                    @foreach ($penulis as $item)
                        <option value="{{ $item->id }}" {{ $item->id == $buku->penulis_id ? 'selected' : '' }}>
                            {{ $item->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" name="judul" id="judul" class="form-control" value="{{ $buku->judul }}" required>
            </div>
            <div class="mb-3">
                <label for="published_date" class="form-label">Tanggal Terbit</label>
                <input type="date" name="published_date" id="published_date" class="form-control" value="{{ $buku->published_date }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</body>

</html>
