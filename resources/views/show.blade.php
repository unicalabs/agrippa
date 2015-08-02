@extends ('app')

@section('title', 'Retrieve')

@section('content')
	@if(!empty($secret))
		<pre>{{ $secret }}</pre>
		<span class="badge">Expires {{ $expires_at->diffForHumans() }}.</span>
	@else
		Secret not found.
	@endif
@stop