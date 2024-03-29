@extends('admin.main')

@section('container')

<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3 d-flex justify-content-end">
        <h4 class="m-0 font-weight-bold text-primary">{{ $title }}</h4>
		@if(Auth::user()->status == "karyawan")
        	<a href="{{ route('jurnalkebersihan.create') }}" class="btn btn-primary ml-auto"><i class="fa fa-plus" aria-hidden="true"></i></i></a>
			
		@else
			<a href="/" class="btn btn-danger ml-auto"><i class="fa-solid fa-arrow-left-long"></i></a>
		@endif
	</div>
	@if (Auth::user()->status == "karyawan")
		<div class="col-xl-3 col-md-6 mt-3">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-1 font-weight-bold text-primary text-uppercase mb-1">
								Lokasi Tugas</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">{{ $ruangan->blokruang }}</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endif
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
						<th>Tanggal dan Waktu</th>
                        <th>Foto</th>
                        <th>Keterangan</th>
                        <th>Status Validasi</th>
						@if(Auth::user()->status == "administrator" || Auth::user()->status == "katu")
						<th>Aksi</th>
						@endif
						@if (Auth::user()->status == "karyawan")
						<th>Tempat</th>
						@endif
					</tr>
				</thead>
				<tbody>
					@if ($jurnalkebersihan->count() > 0)
						@foreach ($jurnalkebersihan as $item)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $item->namalengkap }}</td>
							<td>{{ $item->tanggal }} {{ $item->waktu }}</td>
              <td><img src="{{ asset('/imgKebersihan/'.$item->foto) }}" width="100"></td>
							<td>{{ $item->keterangan }}</td>
               <td>
								@if($item->validasi == 0)
									Belum Divalidasi
								@else
									Telah Divalidasi
								@endif
							</td>
							@if(Auth::user()->status == "administrator" || Auth::user()->status == "katu")
							<td>
								<div role="group" aria-label="Contoh Biasa" class="d-flex">
									<a href="{{ route('jurnalkebersihan.show', ['jurnalkebersihan' => $item->id]) }}" class="btn btn-secondary m-1"><i class="fa-solid fa-file"></i></a>
									{{-- <a href="{{ route('jadwal.edit', ['jadwal' => $item->id]) }}" class="btn btn-warning m-1"><i class="fa fa-pencil" aria-hidden="true"></i></a>
									<form action="{{ route('jadwal.destroy', ['jadwal'=>$item->id]) }}" method="POST" onsubmit="return confirm('Yakin ingin Hapus?')">
										@csrf
										@method('DELETE')
										<button class="btn btn-danger m-1" ><i class="fa fa-trash" aria-hidden="true"></i></button>
									</form> --}}
									@if ($item->validasi == 0)
										<a href="{{ url('/jurnalkebersihan/status/'.$item->id) }}" class="btn btn-success m-1">Divalidasi</a>
									@else
										<a href="{{ url('/jurnalkebersihan/status/'.$item->id) }}" class="btn btn-danger m-1">Batalkan Validasi</a>
									@endif
								</div>
							</td>
							@endif
							@if (Auth::user()->status == "karyawan")
						<td>{{ $item->blokruang }}</th>
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