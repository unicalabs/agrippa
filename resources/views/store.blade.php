@extends ('app')

@section('title', 'Created')

@section('content')
	<pre>{{ $secret->uuid4 }}</pre>
@stop