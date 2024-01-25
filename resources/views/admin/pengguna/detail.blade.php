@extends('admin.main')

@section('container')


<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3 d-flex justify-content-end">
        <h4 class="m-0 font-weight-bold text-primary">Detail</h4> 
		<a href="{{ route('pengguna.index') }}" class="btn btn-danger ml-auto"><i class="fa-solid fa-arrow-left-long"></i></a>  
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
			<div class="col-md-6">
			  <label for="inputState" class="form-label">Status</label>
			  @if ($user->status == "karyawan")
			  	<input type="text" class="form-control" value="Tenaga Administrasi Sekolah" readonly>
			  @elseif($user->status == "katu")
			    <input type="text" class="form-control" value="Kepala Tata Usaha" readonly>
			  @elseif($user->status == "administrator")
			    <input type="text" class="form-control" value="Administrator SIMTAS" readonly>
			  @endif
			 
			</div>
	</div>
</div>
@endsection