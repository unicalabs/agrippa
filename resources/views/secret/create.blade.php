@extends ('app')

@section('title', 'Create')

@section('content')
    <legend>Create Shared Secret</legend>
    <form action="store" method="POST" role="form">
        <div class="form-group">
            <label for="secret">Secret</label>
            <textarea name="secret" id="secret" class="form-control" rows="3" required="required"></textarea>
        </div>

        <div class="form-group">
            <label for="expires_time">Expiration (UTC)</label>
            <fieldset class="form-inline">
                <input type="date" name="expires_date" id="expires_date" class="form-control" value="{{ $now->format('Y-m-d') }}" required="required" title="">
                <input type="time" name="expires_time" id="expires_time" class="form-control" value="{{ $now->format('H:i') }}" required="required" title="">
                
            </fieldset>
        </div>

        <div class="form-group">
            <label for="expires_views">View Limit</label>
            <input type="number" name="expires_views" id="expires_views" class="form-control" value="5" min="1" max="" step="" required="required" title="">
        </div>

        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop