@extends('admin.main')

@section('container')

<h1 class="h3 mb-2 text-gray-800">{{ $title }}</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3 d-flex justify-content-end">
        <h4 class="m-0 font-weight-bold text-primary">List Pengguna</h4>
        <a href="{{ route('pengguna.create') }}" class="btn btn-primary ml-auto"><i class="fa fa-plus" aria-hidden="true"></i></i></a>  
	</div>
	<div class="card-body">
		<div class="table-responsive">
			@if (Session::has('sukses'))
				<div class="alert alert-success" role="alert">
				{{ Session::get('sukses') }}
			</div>
			@endif
			
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th class="col-1">Id</th>
						<th>Nama Lengkap</th>
						<th>Jenis Kelamin</th>
						<th>Username</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@if ($user->count() > 0)
						@foreach ($user as $item)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $item->namalengkap }}</td>
								<td>{{ $item->jeniskelamin }}</td>
								<td>{{ $item->username }}</td>
								<td>{{ $item->level }}</td>
								<td>
									<div role="group" aria-label="Contoh Biasa" class="d-flex">
										<a href="{{ route('pengguna.show', ['pengguna' => $item->id]) }}" class="btn btn-secondary m-1"><i class="fa-solid fa-file"></i></a>
										<a href="{{ route('pengguna.edit', ['pengguna' => $item->id]) }}" class="btn btn-warning m-1"><i class="fa fa-pencil" aria-hidden="true"></i></a>
										<form action="{{ route('pengguna.destroy', ['pengguna' => $item->id]) }}" method="POST" onsubmit="return confirm('Yakin ingin Hapus?')">
										@csrf
										@method('DELETE')
										<button class="btn btn-danger m-1" ><i class="fa fa-trash" aria-hidden="true"></i></button>
										</form>
									</div>
								</td>
							</tr>
						@endforeach
					@endif
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection