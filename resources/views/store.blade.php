@extends ('app')

@section('title', 'Created')

@section('content')
<ul class="list-group">
	<li class="list-group-item">{{ $secret->secret }}</li>
	<li class="list-group-item">{{ $secret->uuid4 }}</li>
</ul>
@stop