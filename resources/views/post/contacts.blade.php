@extends('layouts.post')

@section('content')
	{{-- @dump(Session::all()) --}}
	{{-- <div><h2>{{ $title_head }}</h2></div> --}}
	@if ( !empty(session( 'message' )) )
		<div class="alert alert-danger">{{ session('message') }}</div>
	@endif
	
	@if ( !empty($errors) )
	<ul class="alert alert-danger">
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
	@endif	

	<form action="{{ route('admin_contact') }}" method="POST">
		@csrf
		<input type="text" name="name" value={{ old('name') }}><br>
		<input type="text" name="site" value={{ old('site') }}><br>
		<textarea name="text" id="" cols="30" rows="10">
			{{ old('text') }}
		</textarea><br>
		<input type="submit" value="submit">
	</form>
@endsection