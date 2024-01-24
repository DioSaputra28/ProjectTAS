@extends('admin.main')

@section('container')

<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3 d-flex justify-content-end">
        <h4 class="m-0 font-weight-bold text-primary">{{ $title }}</h4>
		@if(Auth::user()->status == "karyawan")
        	<a href="{{ route('jurnalkegiatan.create') }}" class="btn btn-primary ml-auto"><i class="fa fa-plus" aria-hidden="true"></i></i></a>
		@else
			<a href="/" class="btn btn-danger ml-auto"><i class="fa-solid fa-arrow-left-long"></i></a>
		@endif
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
						<th>Tanggal</th>
                        <th>Kegiatan</th>
                        <th>Status Validasi</th>
						@if (Auth::user()->status == "katu" || Auth::user()->status == "administrator")
						<th>Aksi</th>
						@endif
					</tr>
				</thead>
				<tbody>
					@if ($jurnalkegiatan->count() > 0)
						@foreach ($jurnalkegiatan as $item)
							
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $item->namalengkap }}</td>
							<td>{{ $item->tanggal }}</td>
                            <td>{{ $item->kegiatan }}</td>
                            <td>
								@if($item->validasi == 0)
									Belum Divalidasi
								@else
									Telah Divalidasi
								@endif
							</td>
							@if (Auth::user()->status == "katu")
							<td>
								<div role="group" aria-label="Contoh Biasa" class="d-flex">  
								  	@if ($item->validasi == 0)
										<a href="{{ url('/jurnalkegiatan/status/'.$item->id) }}" class="btn btn-success m-1">Divalidasi</a>
									@else
										<a href="{{ url('/jurnalkegiatan/status/'.$item->id) }}" class="btn btn-danger m-1">Batalkan Validasi</a>
									@endif 
								 
								</div>
							</td>
							@elseif(Auth::user()->status == "administrator")
							<td>
								<div role="group" aria-label="Contoh Biasa" class="d-flex">
									<a href="{{ route('jurnalkegiatan.edit', ['jurnalkegiatan' => $item->id]) }}" class="btn btn-warning m-1"><i class="fa fa-pencil" aria-hidden="true"></i></a>
									<form action="{{ route('jurnalkegiatan.destroy', ['jurnalkegiatan'=>$item->id]) }}" method="POST" onsubmit="return confirm('Yakin ingin Hapus?')">
										@csrf
										@method('DELETE')
										<button class="btn btn-danger m-1" ><i class="fa fa-trash" aria-hidden="true"></i></button>
									</form>
									
									@if ($item->validasi == 0)
										<a href="{{ url('/jurnalkegiatan/status/'.$item->id) }}" class="btn btn-success m-1">Divalidasi</a>
									@else
										<a href="{{ url('/jurnalkegiatan/status/'.$item->id) }}" class="btn btn-danger m-1">Batalkan Validasi</a>
									@endif 
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

<script>
	$(function() { 
			$('.toggle-class').change(function() { 
			var validasi = $(this).prop('checked') == true ? 1 : 0;  
			var id = $(this).data('id');  
			$.ajax({ 
	
				type: "GET", 
				dataType: "json", 
				url: '/jurnalkegiatan/un_status', 		
				data: {'validasi': validasi, 'id': id}, 
				success: function(data){ 
				console.log(data.success) 
			 } 
		  }); 
	   }) 
	}); 
 </script>
@endsection