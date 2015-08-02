@extends ('app')

@section('title', 'Retrieve')

@section('content')
	@if(!empty($secret))
		<pre>{{ $secret }}</pre>
	@else
		Secret not found.
	@endif
@stop