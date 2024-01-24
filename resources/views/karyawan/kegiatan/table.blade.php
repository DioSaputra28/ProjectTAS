@extends('admin.main')

@section('container')



<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3 d-flex justify-content-end">
        <h4 class="m-0 font-weight-bold text-primary">{{ $title }}</h4>
        <a href="{{ route('kegiatankaryawan.create') }}" class="btn btn-primary ml-auto"><i class="fa fa-plus" aria-hidden="true"></i></i></a>  
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
                        @foreach ($kegiatan as $item)
                            
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->user->namalengkap }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>
                                <div role="group" aria-label="Contoh Biasa" class="d-flex">
                                    <a href="{{  route('kegiatankaryawan.show', ['kegiatankaryawan' => $item->id]) }}" class="btn btn-secondary m-1"><i class="fa-solid fa-file"></i></a>
										<a href="{{  route('kegiatankaryawan.edit', ['kegiatankaryawan' => $item->id]) }}" class="btn btn-warning m-1"><i class="fa fa-pencil" aria-hidden="true"></i></a>
									</div>
								</td>
							</tr>
                            @endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection