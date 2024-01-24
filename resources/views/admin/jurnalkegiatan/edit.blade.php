@extends('admin.main')

@section('container')
<h1 class="h3 mb-2 text-gray-800">{{ $title }}</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3 d-flex justify-content-end">
        <h4 class="m-0 font-weight-bold text-primary">Edit Jurnal Kegiatan</h4> 
		<a href="{{ route('jurnalkegiatan.index') }}" class="btn btn-danger ml-auto"><i class="fa-solid fa-arrow-left-long"></i></a>  
	</div>
	<div class="card-body">
		<form class="row g-3" action="{{ route('jurnalkegiatan.update', $jurnalkegiatan[0]->id) }}" method="POST">
			@csrf
			@method('PUT')

			<div class="col-md-6">
                <label for="inputState" class="form-label">Nama Karyawan</label>
                <input type="text" class="form-control" value="{{ $jurnalkegiatan[0]->namalengkap }}" disabled>
            </div>
            <div class="col-md-6">
                <label for="inputState" class="form-label">Tanggal</label>
                <input type="text" class="form-control" value="{{ $jurnalkegiatan[0]->tanggal  }}" disabled>
            </div>
            <div class="col-md-12">
                <label for="inputState" class="form-label">Kegiatan</label>
                <textarea name="kegiatan" class="form-control" placeholder="Kegiatan" rows="10" required>
                    {{ $jurnalkegiatan[0]->kegiatan }}
                </textarea>
            </div>
			<div class="col-12 mt-2">
			  <button type="submit" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i> Edit</button>
			</div>
		  </form>
	</div>
</div>

@endsection