@extends('admin.main')
@section('container')
<div class="container">
    <h1 class="mt-4">Laporan Harian</h1>

    <form action="/laporan/filter" method="post">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="tahun">Pilih Tahun:</label>
                <select class="form-control" id="tahun" name="tahun">
                    @for ($i = date('Y'); $i >= 2020; $i--)
                        <option value="{{ $i }}" {{ $i == $tahun ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="bulan">Pilih Bulan:</label>
                <select class="form-control" id="bulan" name="bulan">
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}" {{ $i == $bulan ? 'selected' : '' }}>
                            {{ date('F', mktime(0, 0, 0, $i, 1)) }}
                        </option>
                    @endfor
                </select>
            </div>
            <div class="form-group col-md-2">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>

    <table class="table mt-4">
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

    <div class="mt-4">
        <a href="/laporan/cetak?tahun={{ $tahun }}&bulan={{ $bulan }}" target="_blank" class="btn btn-success">
            Cetak Laporan
        </a>
    </div>
</div>
@section('container')