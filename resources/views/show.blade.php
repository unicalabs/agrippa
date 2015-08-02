@extends ('app')

@section('title', 'Retrieve')

@section('content')
	@if(!empty($secret))
		<ul class="list-group">
			<li class="list-group-item">{{ $secret->secret }}</li>
			<li class="list-group-item">{{ $secret->uuid4 }}</li>
		</ul>
	@else
		Secret not found.
	@endif
@stop