@extends ('app')

@section('title', 'Retrieve')

@section('content')
	@if(!empty($secretDecrypted))
		<pre>{{ $secretDecrypted }}</pre>
		<span class="badge">Expires {{ $expires_at->diffForHumans() }} or in {{ $views_remaining }} 
			@if($views_remaining == 1)
				view.
			@else
				views.
			@endif
		</span>
	@else
		Secret not found.
	@endif
@stop