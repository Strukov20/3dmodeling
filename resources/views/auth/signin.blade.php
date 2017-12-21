@extends('templates.default')

@section('content')
<div class="col-md-4 col-md-offset-4">
    <h3>@lang("auth.signin_label")</h3>
    <form role="form" class="form-vertical" method="POST" action="{{ route('auth.signin') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="email" class="control-label">@lang("auth.signin",['field'=>'email'])</label>
            <input class="form-control" type="email" name="email" id="email">
        </div>
        <div class="form-group">
            <label for="password" class="control-label">@lang("auth.signin",['field'=>'password'])</label>
            <input class="form-control" type="password" name="password" id="password">
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="remember"> @lang("auth.remember_me")
            </label>
        </div>
        <input class="btn btn-primary" type="submit" value="@lang("auth.submit")">
    </form>
</div>
@endsection