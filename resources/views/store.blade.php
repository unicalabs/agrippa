@extends ('app')

@section('title', 'Created')

@section('content')
	<pre>{{ Request::root() }}/show/{{ $uuid4 }}</pre>
@stop