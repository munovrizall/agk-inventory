<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Stok Barang</title>
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
    <h1>Daftar Stok Barang</h1>
    <table>
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Jumlah Stok</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stokBarangs as $stokBarang)
            <tr>
                <td>{{ $stokBarang->nama_barang }}</td>
                <td>{{ $stokBarang->stok }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
