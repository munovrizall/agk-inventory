<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Barang Keluar</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Daftar Barang Keluar</h1>
    <table>
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Jumlah Keluar</th>
                <th>Tanggal Keluar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barangKeluars as $barangKeluar)
            <tr>
                <td>{{ $barangKeluar->barang->nama_barang }}</td>
                <td>{{ $barangKeluar->jumlah_keluar }}</td>
                <td>{{ $barangKeluar->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
