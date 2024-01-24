@extends('admin.main')

@section('container')



<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3 d-flex justify-content-end">
        <h4 class="m-0 font-weight-bold text-primary">{{ $title }}</h4>
        <a href="" class="btn btn-danger ml-auto"><i class="fa-solid fa-arrow-left-long"></i></a>
	</div>
	<div class="card-body">
			<div class="col-md-6">
                <label for="inputEmail4" class="form-label">Nama Legkap</label>
                <input type="text" class="form-control" placeholder="Nama Lengkap" name="namalengkap" value="{{ $data->user->namalengkap }}" readonly>
              </div>
              <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Tanggal</label>
                  <input type="text" class="form-control" placeholder="Kata Sandi" value="{{ $data->tanggal }}" readonly>
              </div>
              <div class="col-6">
                <label for="inputAddress" class="form-label">Kegiatan</label>
                <input type="text" class="form-control" placeholder="Username" name="username" value="{{ $data->kegiatan }}" readonly>
              </div>
	</div>
</div>
@endsection