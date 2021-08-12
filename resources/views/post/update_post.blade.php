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

@can('update', $post)
	<p>Have allows</p>
@endcan


@cannot('update', $post)
	<p>Have not allows</p>
@endcan
@isset ($post)
<form action="{{ route('admin_update_post_p') }}" method="POST">
	@csrf
	<input type="hidden" name="id" value={{ $post->id }}>
	<input type="text" name="name" value="{{ $post->name }}" placeholder="name"><br>
	<input type="text" name="img" value="{{ $post->img }}" placeholder="img"><br>
	<textarea name="text" id="" cols="30" rows="10">{{ $post->text }}</textarea><br>
	<input type="submit" value="submit">
</form>
@endisset



@endsection