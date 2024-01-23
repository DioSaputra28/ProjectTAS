@extends('admin.main')

@section('container')

<h1 class="h3 mb-2 text-gray-800">{{ $title }}</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3 d-flex justify-content-end">
        <h4 class="m-0 font-weight-bold text-primary">List Tugas Kebersihan</h4>
        <a href="{{ route('jadwal.create') }}" class="btn btn-primary ml-auto"><i class="fa fa-plus" aria-hidden="true"></i></i></a>  
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
						<th class="col-1">Id </th>
						<th>Petugas</th>
						<th>Blok Ruang</th>
						@if(Auth::user()->status == "administrator")
						<th>Aksi</th>
						@endif
					</tr>
				</thead>
				<tbody>
					@if ($jadwal->count() > 0)
						@foreach ($jadwal as $item)
							
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $item->namalengkap }}</td>
							<td>{{ $item->blokruang }}</td>
							@if(Auth::user()->status == "administrator")
							<td>
								<div role="group" aria-label="Contoh Biasa" class="d-flex">
									{{-- <a href="{{ route('jadwal.show', ['jadwal' => $item->id]) }}" class="btn btn-secondary m-1"><i class="fa-solid fa-file"></i></a> --}}
									<a href="{{ route('jadwal.edit', ['jadwal' => $item->id]) }}" class="btn btn-warning m-1"><i class="fa fa-pencil" aria-hidden="true"></i></a>
									<form action="{{ route('jadwal.destroy', ['jadwal'=>$item->id]) }}" method="POST" onsubmit="return confirm('Yakin ingin Hapus?')">
										@csrf
										@method('DELETE')
										<button class="btn btn-danger m-1" ><i class="fa fa-trash" aria-hidden="true"></i></button>
									</form>
								</div>
							</td>
							@endif
						</tr>
						@endforeach
					@endif
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection