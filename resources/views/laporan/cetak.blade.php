@extends('admin.main')
@section('container')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Harian - {{ $bulan }} {{ $tahun }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>

    <h1>Laporan Harian - {{ $bulan }} {{ $tahun }}</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Kegiatan</th>
                <th>Hasil</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($laporan as $data)
                <tr>
                    <td>{{ $data->tanggal }}</td>
                    <td>{{ $data->kegiatan }}</td>
                    <td>{{ $data->hasil }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Tidak ada data untuk bulan dan tahun yang dipilih.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
@endsection