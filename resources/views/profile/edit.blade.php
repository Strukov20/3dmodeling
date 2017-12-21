@extends('templates.default')

@section('content')
    <div class="container">
        <div class="col-lg-6">
            <h3>Edit profile</h3>
            <form enctype="multipart/form-data" name="info" role="form" method="post" action="{{ route('profile.editPost') }}" class="form-vertical">
                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : ''}} col-lg-6">
                    <label for="first_name" class="control-label">First name</label>
                    <input type="text" name="first_name" class="form-control" id="first_name" value="{{ Request::old('first_name') ?: Auth::user()->first_name }}">
                    @if( $errors->has('first_name') )
                        <span class="help-block">{{ $errors->first('first_name') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('last_name') ? ' has-error' : ''}} col-lg-6">
                    <label for="last_name" class="control-label">Last name</label>
                    <input type="text" name="last_name" class="form-control" id="last_name" value="{{ Request::old('last_name') ?: Auth::user()->last_name }}">
                    @if( $errors->has('last_name') )
                        <span class="help-block">{{ $errors->first('last_name') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('nickname') ? ' has-error' : ''}} col-lg-12">
                    <label for="nickname" class="control-label">Nickname</label>
                    <input type="text" name="nickname" class="form-control" id="nickname" placeholder="{{ Auth::user()->nickname }}" value="{{ Request::old('nickname') ?: '' }}">
                    @if( $errors->has('nickname') )
                        <span class="help-block">{{ $errors->first('nickname') }}</span>
                    @endif
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="avatar" class="control-label">
                            Avatar
                        </label>
                        <input type="file" name="avatar" class="form-control" id="avatar">
                    </div>
                    <div class="form-group{{ $errors->has('date_of_birth') ? ' has-error' : ''}}">
                        <label for="date_of_birth" class="control-label">Date of birth</label>
                        <input type="date" name="date_of_birth" class="form-control" id="date_of_birth" value="{{ Request::old('date_of_birth') ?: Auth::user()->date_of_birth }}">
                        @if( $errors->has('date_of_birth') )
                            <span class="help-block">{{ $errors->first('date_of_birth') }}</span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('information') ? ' has-error' : ''}}">
                        <label for="information" class="control-label">Information</label>
                        <textarea name="information" class="form-control" id="information" rows="3" maxlength="200">{{ Request::old('information') ?: Auth::user()->information }}</textarea>
                        @if( $errors->has('information') )
                            <span class="help-block">{{ $errors->first('information') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input class="btn btn-default" type="submit" value="Update">
                    </div>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
        </div>
        <div class="col-lg-6">
            <h3>Change password</h3>
            <form name="pass" role="form" method="post" action="{{ route('profile.editPass') }}" class="form-vertical">
                <div class="form-group{{ $errors->has('old_password') ? ' has-error' : ''}} col-lg-12">
                    <label for="old_password" class="control-label">Old password</label>
                    <input type="password" name="old_password" class="form-control" id="old_password" value="">
                    @if( $errors->has('old_password') )
                        <span class="help-block">{{ $errors->first('old_password') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : ''}} col-lg-6">
                    <label for="password" class="control-label">New password</label>
                    <input type="password" name="password" class="form-control" id="password" value="">
                    @if( $errors->has('password') )
                        <span class="help-block">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : ''}} col-lg-6">
                    <label for="password_confirmation" class="control-label">Password confirmation</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" value="">
                    @if( $errors->has('password_confirmation') )
                        <span class="help-block">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                </div>
                <div class="form-group col-lg-12">
                    <button class="btn btn-default" type="submit">Change</button>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
@stop