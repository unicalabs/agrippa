@extends ('app')

@section('title', 'Created')

@section('content')
	<pre>{{ Request::root() }}/show/{{ $uuid4 }}</pre>
	<span class="label label-default">Expires {{ $expires_at->diffForHumans() }} or in {{ $views_remaining }} 
		@if($views_remaining == 1)
			view.
		@else
			views.
		@endif
	</span>
@stop