@extends ('app')

@section('title', 'Retrieve')

@section('content')
	@if(!empty($secret))
		<pre>{{ $secret->secret }}</pre>
	@else
		Secret not found.
	@endif
@stop