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

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        .kop-surat {
            text-align: center;
            margin-left: -50px;
            margin-right: -50px;
            margin-top: -50px;
            margin-bottom: 20px;
        }

        .ttd {
            text-align: right;
            margin-top: 200px;
        }

        .ttd .date {
            margin-bottom: 100px;
        }

        .ttd .name {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="kop-surat">
        <img src="{{ public_path('images/kop-surat.png') }}" alt="Kop Surat" width="100%">
    </div>
    <h2>Daftar Barang Keluar</h2>
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
                <td>{{ $barangKeluar->jumlah_keluar . ' ' . $barangKeluar->barang->satuan->nama_satuan }}</td>
                <td>{{ $barangKeluar->created_at->format('d/m/Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="ttd">
        <div class="date">
            Tangerang Selatan, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
        </div>
        <div class="name">
            WAWAN KASEMO
        </div>
    </div>
</body>

</html>