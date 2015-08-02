@extends ('app')

@section('title', 'Retrieve')

@section('content')
	@if(!empty($secretDecrypted))
		<pre>{{ $secretDecrypted }}</pre>

		@if($views_remaining == 0)
			<span class="label label-warning">Expired! (This link won't work again.)</span>
		@else
			<span class="label label-default">Expires {{ $expires_at->diffForHumans() }} or in {{ $views_remaining }} 
				@if($views_remaining == 1)
					view.
				@else
					views.
				@endif
			</span>
		@endif
	@else
		Secret not found.
	@endif
@stop