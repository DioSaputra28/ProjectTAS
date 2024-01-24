@extends('admin.main')

@section('container')

<h1 class="h3 mb-2 text-gray-800">{{ $title }}</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3 d-flex justify-content-end">
        <h4 class="m-0 font-weight-bold text-primary">{{ $title }}</h4>
		<a href="/" class="btn btn-danger ml-auto"><i class="fa-solid fa-arrow-left-long"></i></a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
            <h4 class="alert alert-warning">Anda Tidak Terjadwal Sebagai Petugas Kebersihan</h4>
		</div>
	</div>
</div>

@endsection