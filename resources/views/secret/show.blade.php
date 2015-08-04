@extends ('app')

@section('title', 'Retrieve')

@section('content')
    <legend>Shared Secret</legend>
    @if(!empty($secretDecrypted))
        <pre>{{ $secretDecrypted }}</pre>

        @if($views_remaining == 0)
            <span class="label label-warning">Expired! (This link won't work again.)</span>
        @else
            <span class="label label-default">Expires <span id="datetime">{{ $expires_at }}</span> or in {{ $views_remaining }} 
                @if($views_remaining == 1)
                    view.
                @else
                    views.
                @endif
            </span>
        @endif
    @else
        <pre></pre>
        <span class="label label-danger">Secret not found.<span>
    @endif
@stop