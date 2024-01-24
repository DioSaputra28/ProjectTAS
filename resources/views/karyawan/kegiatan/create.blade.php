@extends('admin.main')

@section('container')

@if(session()->has('sukses'))
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		{{ session('sukses') }}
	</div>
@endif
<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3 d-flex justify-content-end">
        <h4 class="m-0 font-weight-bold text-primary"> {{ $title }}</h4> 
		<a href="{{ route('pengguna.index') }}" class="btn btn-danger ml-auto"><i class="fa-solid fa-arrow-left-long"></i></a>  
	</div>
	<div class="card-body">
		<form class="row g-3" action="{{ route('kegiatankaryawan.store') }}" method="POST">
			@csrf
            <input type="hidden" name="iduser" value="{{ Auth::user()->id }}">
			<div class="col-md-5">
			  <label for="inputEmail4" class="form-label">Tanggal</label>
              <input class="form-control" type="date" name="tanggal" value="">
			</div>
			<div class="col-md-5">
			  <label for="inputPassword4" class="form-label">Kegiatan </label>
			  <textarea class="form-control" name="kegiatan" id="exampleFormControlTextarea1" rows="10" "></textarea>
			</div>
            <div class="col-12 mt-2">
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i></button>
              </div>
		  </form>
	</div>
</div>
@endsection