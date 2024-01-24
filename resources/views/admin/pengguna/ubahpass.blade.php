@extends('admin.main')

@section('container')
<h1 class="h3 mb-2 text-gray-800">{{ $title }}</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3 d-flex justify-content-end">
        <h4 class="m-0 font-weight-bold text-primary">{{ $title }}</h4>
        <a href="/profil/{{ Auth::user()->id }}" class="btn btn-danger ml-auto"><i class="fa-solid fa-arrow-left-long"></i></a>
	</div>
	<div class="card-body">
        <form method="POST" action="passchange">
            @csrf 
			
			@if (Session::has('status'))
				<div class="alert alert-success">{{ Session::get('status') }}</div>
			@elseif(Session::has('error'))
				<div class="alert alert-danger">{{ Session::get('error') }}</div>
			@endif

		<div class="col-md-6">
		  <label for="passwordlama" class="form-label">Password Lama</label>
            <input id="passlama" type="password" class="form-control" name="passlama" autocomplete="current-password">
		</div>
		<div class="col-md-6">
		   <label for="passwordbaru" class="form-label">Password Baru</label>
			<input id="passbaru" type="password" class="form-control" name="passbaru" autocomplete="current-password">
		</div>
		<div class="col-6">
		  <label for="confirmpass" class="form-label">Konfirmasi Password Baru</label>
          <input id="passconfirm" type="password" class="form-control" name="passconfirm" autocomplete="current-password">
		</div>
        <div class="col-6 text-right">
            <br>
            <button type="submit" class="btn btn-primary">
                Ubah Password
            </button>
        </div>
        </form>
	</div>
</div>
@endsection