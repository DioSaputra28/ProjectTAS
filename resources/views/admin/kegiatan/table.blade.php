@extends('admin.main')

@section('container')



<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3 d-flex justify-content-end">
        <h4 class="m-0 font-weight-bold text-primary">{{ $title }}</h4>
        <a href="" class="btn btn-primary ml-auto"><i class="fa fa-plus" aria-hidden="true"></i></i></a>  
	</div>
	<div class="card-body">
		<div class="table-responsive">
			@if(Session::has('sukses'))
				<div class="alert alert-success" role="alert">
				{{ Session::get('sukses') }}
				</div>
			@endif
			
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th class="col-1">Id</th>
						<th>Nama Lengkap</th>
						<th>Tanggal</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td>
									<div role="group" aria-label="Contoh Biasa" class="d-flex">
										<a href="" class="btn btn-secondary m-1"><i class="fa-solid fa-file"></i></a>
										<a href="" class="btn btn-warning m-1"><i class="fa fa-pencil" aria-hidden="true"></i></a>
										<form action="" method="POST" onsubmit="return confirm('Yakin ingin Hapus?')">
										@csrf
										@method('DELETE')
										<button class="btn btn-danger m-1" ><i class="fa fa-trash" aria-hidden="true"></i></button>
										</form>
									</div>
								</td>
							</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection