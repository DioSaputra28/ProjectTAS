@extends('admin.main')

@section('container')
<h1 class="h3 mb-2 text-gray-800">{{ $title }}</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3 d-flex justify-content-end">
        <h4 class="m-0 font-weight-bold text-primary">Tambah Data Jurnal Kebersihan</h4> 
		<a href="{{ route('jurnalkebersihan.index') }}" class="btn btn-danger ml-auto"><i class="fa-solid fa-arrow-left-long"></i></a>  
	</div>
	<div class="card-body">
		<form class="row g-3" action="{{ route('jurnalkebersihan.store') }}" method="POST" enctype="multipart/form-data">
			@csrf

            <input type="text" name="iduser" value="{{ Auth::user()->id }}" hidden>
            @foreach ($jadwal as $data)
            <input type="text" name="idjadwal" value="{{ $data->id }}" hidden>
            @endforeach
            <input type="text" name="tanggal" value="{{ now() }}" hidden>
            <?php date_default_timezone_set('Asia/Jakarta') ?>
            <input type="text" name="waktu" value="{{ date('h:i:s') }}" hidden>

			<div class="col-md-4">
			  <label for="inputState" class="form-label">Nama Karyawan</label>
			  <input type="text" class="form-control" value="{{ Auth::user()->namalengkap }}" disabled>
			</div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">Tanggal</label>
                <input type="text" class="form-control" value="{{ Date('d-M-Y') }}" disabled>
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">Waktu</label>
                <?php date_default_timezone_set('Asia/Jakarta') ?>
                <input type="text" class="form-control" value="{{ date('h:i:s a') }}" disabled>
            </div>
            <div class="col-md-12">
                <label for="inputState" class="form-label">Foto Lokasi</label>
                <input type="file" name="foto" class="form-control" required>
            </div>
            <div class="col-md-12">
                <label for="inputState" class="form-label">Keterangan</label>
                <textarea name="keterangan" class="form-control" placeholder="Keterangan" rows="10" required></textarea>
            </div>
			<div class="col-12 mt-2">
			  <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Simpan</button>
			</div>
		  </form>
	</div>
</div>
@endsection