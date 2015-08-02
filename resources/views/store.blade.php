@extends ('app')

@section('title', 'Created')

@section('content')
	<pre>{{ Request::root() }}/show/{{ $secret->uuid4 }}</pre>
@stop