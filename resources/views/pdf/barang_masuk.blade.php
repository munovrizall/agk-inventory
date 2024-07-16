<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Barang Masuk</title>
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
    <h1>Daftar Barang Masuk</h1>
    <table>
        <thead>
            <tr>
                <th>Nama Supplier</th>
                <th>Nama Barang</th>
                <th>Jumlah Masuk</th>
                <th>Tanggal Masuk</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barangMasuks as $barangMasuk)
            <tr>
                <td>{{ $barangMasuk->supplierId->nama_supplier }}</td>
                <td>{{ $barangMasuk->barangId->nama_barang }}</td>
                <td>{{ $barangMasuk->jumlah_masuk }}</td>
                <td>{{ $barangMasuk->created_at->format('d/m/Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
