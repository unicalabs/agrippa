@extends ('app')

@section('title', 'Created')

@section('content')
    <legend>Shared Secret</legend>
    <pre>{{ Request::root() }}/show/{{ $uuid4 }}</pre>
    <span class="label label-default">Expires <span id="datetime">{{ $expires_at }}</span> or in {{ $views_remaining }} 
        @if($views_remaining == 1)
            view.
        @else
            views.
        @endif
    </span>
@stop

@section('scriptFooter')
    <script>
        var offset = moment().utcOffset() / 60;
        var datetime = moment(document.getElementById("datetime").innerHTML);
        datetime = datetime.add(offset, 'hour');
        document.getElementById("datetime").innerHTML = datetime.fromNow();
    </script>
@stop