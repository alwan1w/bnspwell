<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Form Peminjam</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            color: #333;
            position: relative;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        table th {
            background-color: #f4f6f9;
            font-weight: bold;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 14px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            color: white;
            background-color: #007bff;
            margin-right: 10px;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0.1;
            z-index: -1;
            text-align: center;
        }

        .watermark img {
            max-width: 300px;
            height: auto;
        }

        @media print {
            .no-print {
                display: none !important;
            }

            body {
                margin: 0;
            }

            table {
                page-break-inside: auto;
            }

            .watermark {
                opacity: 0.1;
            }
        }
    </style>
    <script>
        function printPage() {
            window.print();
        }
    </script>
</head>

<body>
    <div class="watermark">
        <img src="https://upload.wikimedia.org/wikipedia/commons/4/49/Gambar_Buku.png" alt="Logo" class="img-fluid" style="max-height: 100px;">
        <p>© Lisensi Resmi</p>
    </div>

    <h2>Data Peminjam</h2>
    <table>
        <tr>
            <th>Nama</th>
            <td>{{ $peminjam->nama }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $peminjam->email }}</td>
        </tr>
        <tr>
            <th>Tanggal Lahir</th>
            <td>{{ $peminjam->tanggal_lahir }}</td>
        </tr>
        <tr>
            <th>Nomor Telepon</th>
            <td>{{ $peminjam->nomor_telepon }}</td>
        </tr>
        <tr>
            <th>Agama</th>
            <td>{{ $peminjam->agama }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $peminjam->alamat }}</td>
        </tr>
    </table>
</body>

</html>
