@extends('admin.main')

@section('container')



<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3 d-flex justify-content-end">
        <h4 class="m-0 font-weight-bold text-primary">{{ $title }}</h4>
		<a href="{{ route('jurnalkebersihan.index') }}" class="btn btn-danger ml-auto"><i class="fa-solid fa-arrow-left-long"></i></a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<tr>
					<td width="200">Petugas</td>
                    <td>{{ $jurnalkebersihan[0]->namalengkap }}</td>
				</tr>
                <tr>
					<td>Tanggal dan Waktu</td>
                    <td>{{ $jurnalkebersihan[0]->tanggal }} {{ $jurnalkebersihan[0]->waktu }}</td>
				</tr>
                <tr>
					<td>Foto</td>
                    <td><img src="{{ asset('/imgKebersihan/'.$jurnalkebersihan[0]->foto) }}" width="500"></td></td>
				</tr>
                <tr>
					<td>Keterangan</td>
                    <td>{{ $jurnalkebersihan[0]->keterangan }}</td>
				</tr>
                <tr>
					<td>Status</td>
                    <td>
                        @if($jurnalkebersihan[0]->validasi == 0)
							Belum Divalidasi
						@else
							Telah Divalidasi
						@endif
                    </td>
				</tr>
				
			</table>
		</div>
	</div>
</div>
@endsection