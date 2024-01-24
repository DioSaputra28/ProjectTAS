@extends('admin.main')

@section('container')


<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3 d-flex justify-content-end">
        <h4 class="m-0 font-weight-bold text-primary">{{ $title }}</h4> 
		<a href="{{ route('jadwal.index') }}" class="btn btn-danger ml-auto"><i class="fa-solid fa-arrow-left-long"></i></a>  
	</div>
	<div class="card-body">
		<div class="col-md-6">
            <label for="inputEmail4" class="form-label">Nama Petugas</label>
            <input type="text" class="form-control" value="{{ $jadwal[0]->namalengkap }}" readonly>
      </div>
          <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Ruangan</label>
              <input type="text" class="form-control"  value="{{ $jadwal[0]->blokruang }}" readonly>
          </div>
	</div>
</div>
@endsection