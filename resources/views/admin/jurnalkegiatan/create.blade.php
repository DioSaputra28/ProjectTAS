@extends('admin.main')

@section('container')
<h1 class="h3 mb-2 text-gray-800">{{ $title }}</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3 d-flex justify-content-end">
        <h4 class="m-0 font-weight-bold text-primary">Tambah Data Jurnal Kegiatan</h4> 
		<a href="{{ route('jurnalkegiatan.index') }}" class="btn btn-danger ml-auto"><i class="fa-solid fa-arrow-left-long"></i></a>  
	</div>
	<div class="card-body">
		<form class="row g-3" action="{{ route('jurnalkegiatan.store') }}" method="POST">
			@csrf

            <input type="text" name="iduser" value="{{ Auth::user()->id }}" hidden>
            <input type="text" name="tanggal" value="{{ now() }}" hidden>

			<div class="col-md-6">
			  <label for="inputState" class="form-label">Nama Karyawan</label>
			  <input type="text" class="form-control" value="{{ Auth::user()->namalengkap }}" disabled>
			</div>
            <div class="col-md-6">
                <label for="inputState" class="form-label">Tanggal</label>
                <input type="text" class="form-control" value="{{ Date('d-M-Y') }}" disabled>
            </div>
            <div class="col-md-12">
                <label for="inputState" class="form-label">Kegiatan</label>
                <textarea name="kegiatan" class="form-control" placeholder="Kegiatan" rows="10"></textarea>
            </div>
			<div class="col-12 mt-2">
			  <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Simpan</button>
			</div>
		  </form>
	</div>
</div>
@endsection