@extends('layouts.post')

@section('content')
	
@if (!empty(session('message')))
	<p>{{ session('message') }}</p>
@endif

@if ( !empty( $errors ) )
	<ul class="alert alert-danger">
		@foreach ($errors->all() as $error)
			<p>{{ $error }}</p>
		@endforeach
	</ul>
	
@endif		

<form action="{{ route('admin_add_post_p') }}" method="POST">
	@csrf
	<input type="text" name="name" value="{{ old('name') }}" placeholder="name"><br>
	<input type="text" name="img" value="{{ old('img') }}" placeholder="img"><br>
	<textarea name="text" id="" cols="30" rows="10">{{ old('text') }}</textarea><br>
	<input type="submit" value="submit">
</form>


@endsection