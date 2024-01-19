@extends('admin.main')

@section('container')
<h1 class="h3 mb-2 text-gray-800">{{ $title }}</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3 d-flex justify-content-end">
        <h4 class="m-0 font-weight-bold text-primary">Detail</h4> 
		<a href="{{ route('pengguna.index') }}" class="btn btn-danger ml-auto"><i class="fa-solid fa-arrow-left-long"></i></a>  
	</div>
	<div class="card-body">
			<div class="col-md-6">
			  <label for="inputEmail4" class="form-label">Nama Legkap</label>
			  <input type="text" class="form-control" placeholder="Nama Lengkap" name="namalengkap" value="{{ $tbuser->namalengkap }}" readonly>
			</div>
			<div class="col-md-6">
			  <label for="inputPassword4" class="form-label">Jenis Kelamin</label>
				<input type="text" class="form-control" placeholder="Kata Sandi" value="{{ $tbuser->jeniskelamin }}" readonly>
			</div>
			<div class="col-6">
			  <label for="inputAddress" class="form-label">Username</label>
			  <input type="text" class="form-control" placeholder="Username" name="username" value="{{ $tbuser->username }}" readonly>
			</div>
			<div class="col-md-4">
			  <label for="inputState" class="form-label">Status</label>
			 <input type="text" class="form-control" placeholder="Kata Sandi" name="katasandi" value="{{ $tbuser->level }}" readonly>
			</div>
			<div class="col-md-4">
			  <label for="inputState" class="form-label">Di Tambahkan</label>
			 <input type="text" class="form-control" placeholder="Kata Sandi" name="katasandi" value="{{ $tbuser->created_at }}" readonly>
			</div>
			<div class="col-md-4">
			  <label for="inputState" class="form-label">Status</label>
			 <input type="text" class="form-control" placeholder="-" value="{{ $tbuser->updated_at }}" readonly>
			</div>
	</div>
</div>
@endsection