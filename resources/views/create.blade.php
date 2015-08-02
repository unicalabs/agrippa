@extends ('app')

@section('title', 'Create')

@section('content')
<form action="store" method="POST" role="form">
    <legend>Create Shared Secret</legend>
    <div class="form-group">
        <label for="secret">Secret</label>
        <textarea name="secret" id="secret" class="form-control" rows="3" required="required"></textarea>
    </div>
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@stop