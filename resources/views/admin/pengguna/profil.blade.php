@extends('admin.main')

@section('container')
<h1 class="h3 mb-2 text-gray-800">{{ $title }}</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3 d-flex justify-content-end">
        <h4 class="m-0 font-weight-bold text-primary">Profil</h4>
        <a href="/passchange" class="btn btn-primary ml-auto">Ubah Password</a>
	</div>
	<div class="card-body">
			<div class="col-md-6">
			  <label for="inputEmail4" class="form-label">Nama Legkap</label>
			  <input type="text" class="form-control" value="{{ $user->namalengkap }}" readonly>
			</div>
			<div class="col-md-6">
			  <label for="inputPassword4" class="form-label">Jenis Kelamin</label>
			  <input type="text" class="form-control" value="{{ $user->jeniskelamin }}" readonly>
			</div>
			<div class="col-6">
			  <label for="inputAddress" class="form-label">Username</label>
			  <input type="text" class="form-control" value="{{ $user->username }}" readonly>
			</div>
	</div>
</div>
@endsection