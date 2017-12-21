@extends('templates.default')

@section('content')
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <h3 class="text-center">@lang('auth.signup_label')</h3>
            <form role="form" method="post" action="{{ route('auth.signup') }}" class="form-vertical">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : ''}} col-lg-12">
                    <label for="email" class="control-label">@lang('auth.signup',['field' => 'email address'])</label>
                    <input type="text" name="email" class="form-control" id="email" value="{{ Request::old('email') ?: '' }}">
                    @if( $errors->has('email') )
                        <span class="help-block">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : ''}} col-lg-6">
                    <label for="first_name" class="control-label">@lang('auth.signup',['field' => 'name'])</label>
                    <input type="text" name="first_name" class="form-control" id="first_name" value="{{ Request::old('first_name') ?: '' }}">
                    @if( $errors->has('first_name') )
                        <span class="help-block">{{ $errors->first('first_name') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('last_name') ? ' has-error' : ''}} col-lg-6">
                    <label for="last_name" class="control-label">@lang('auth.signup',['field' => 'last name'])</label>
                    <input type="text" name="last_name" class="form-control" id="last_name" value="{{ Request::old('last_name') ?: '' }}">
                    @if( $errors->has('last_name') )
                        <span class="help-block">{{ $errors->first('last_name') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('nickname') ? ' has-error' : ''}} col-lg-12">
                    <label for="nickname" class="control-label">@lang('auth.signup',['field' => 'nickname'])</label>
                    <input type="text" name="nickname" class="form-control" id="nickname" value="{{ Request::old('nickname') ?: '' }}">
                    @if( $errors->has('nickname') )
                        <span class="help-block">{{ $errors->first('nickname') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : ''}} col-lg-12">
                    <label for="password" class="control-label">@lang('auth.choose_password')</label>
                    <input type="password" name="password" class="form-control" id="password" value="">
                    @if( $errors->has('password') )
                        <span class="help-block">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : ''}} col-lg-12">
                    <label for="password_confirmation" class="control-label">@lang('auth.confirm_password')</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" value="">
                    @if( $errors->has('password_confirmation') )
                        <span class="help-block">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                </div>
                <div class="form-group col-lg-12">
                    <button class="btn btn-primary" type="submit">@lang('auth.signup_label')</button>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
@stop