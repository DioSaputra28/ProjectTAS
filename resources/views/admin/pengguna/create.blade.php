@extends('admin.main')

@section('container')
<h1 class="h3 mb-2 text-gray-800">{{ $title }}</h1>

@if(session()->has('sukses'))
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		{{ session('sukses') }}
	</div>
@endif
<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3 d-flex justify-content-end">
        <h4 class="m-0 font-weight-bold text-primary">Data Pengguna</h4> 
		<a href="{{ route('pengguna.index') }}" class="btn btn-danger ml-auto"><i class="fa-solid fa-arrow-left-long"></i></a>  
	</div>
	<div class="card-body">
		<form class="row g-3" action="{{ route('pengguna.store') }}" method="POST">
			@csrf
			<div class="col-md-6">
			  <label for="inputEmail4" class="form-label">Nama Legkap</label>
			  <input type="text" class="form-control" @error('namalengkap') is-invalid
				@enderror placeholder="Nama Lengkap" name="namalengkap" required>
				@error('namalengkap')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
				@enderror
			</div>
			<div class="col-md-6">
			  <label for="inputPassword4" class="form-label">Jenis Kelamin</label>
			  <select class="form-control" aria-label="Default select example" name="jeniskelamin">
				<option selected disabled>Jenis Kelamin</option>
				<option value="Laki-Laki">Laki-Laki</option>
				<option value="Perempuan">Perempuan</option>
			  </select>
			</div>
			<div class="col-6">
			  <label for="inputAddress" class="form-label">Username</label>
			  <input type="text" class="form-control" placeholder="Username" name="username" required>
			</div>
			<div class="col-6">
			  <label for="inputAddress2" class="form-label">Kata Sandi</label>
			  <input type="password" class="form-control" placeholder="Kata Sandi" name="katasandi" required>
			</div>
			<div class="col-md-4">
			  <label for="inputState" class="form-label">Status</label>
			  <select class="form-control" aria-label="Default select example" name="level">
				<option selected disabled>Status</option>
				<option value="Administrator">Administrator</option>
				<option value="Kepala TU">Kepala TU</option>
				<option value="Karyawan">Karyawan</option>
			  </select>
			</div>
			<div class="col-12 mt-2">
			  <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i></button>
			</div>
		  </form>
	</div>
</div>
@endsection