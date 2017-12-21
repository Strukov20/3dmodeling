@extends('templates.default')

@section('content')
    <div class="container">
        <div class="col-lg-6 col-lg-offset-3">
            <h3>Edit profile</h3>
            <form enctype="multipart/form-data" name="info" role="form" method="post" action="{{ route('admin.edit.user', ['user_id' => $user->id]) }}" class="form-vertical">
                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : ''}} col-lg-6">
                    <label for="first_name" class="control-label">First name</label>
                    <input type="text" name="first_name" class="form-control" id="first_name" value="{{ Request::old('first_name') ?: $user->first_name }}">
                    @if( $errors->has('first_name') )
                        <span class="help-block">{{ $errors->first('first_name') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('last_name') ? ' has-error' : ''}} col-lg-6">
                    <label for="last_name" class="control-label">Last name</label>
                    <input type="text" name="last_name" class="form-control" id="last_name" value="{{ Request::old('last_name') ?: $user->last_name }}">
                    @if( $errors->has('last_name') )
                        <span class="help-block">{{ $errors->first('last_name') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('nickname') ? ' has-error' : ''}} col-lg-10">
                    <label for="nickname" class="control-label">Nickname</label>
                    <input type="text" name="nickname" class="form-control" id="nickname" placeholder="{{ $user->nickname }}" value="{{ Request::old('nickname') ?: '' }}">
                    @if( $errors->has('nickname') )
                        <span class="help-block">{{ $errors->first('nickname') }}</span>
                    @endif
                </div>
                <div class="form-group col-lg-2">
                    <label for="validate" class="control-label">Enabled</label>
                    <input type="checkbox" name="validate" class="form-control" id="validate" {{ $user->validate ? 'checked' : '' }}>
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : ''}} col-lg-12">
                    <label for="email" class="control-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="{{ $user->email }}" value="{{ Request::old('email') ?: '' }}">
                    @if( $errors->has('email') )
                        <span class="help-block">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('role') ? ' has-error' : ''}} col-lg-6">
                    <label for="role" class="control-label">
                        Role
                    </label>
                    <input type="text" name="role" class="form-control" id="role" value="{{ Request::old('role') ?: $user->role }}">
                    @if( $errors->has('role') )
                        <span class="help-block">{{ $errors->first('role') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('date_of_birth') ? ' has-error' : ''}} col-lg-6">
                    <label for="date_of_birth" class="control-label">Date of birth</label>
                    <input type="date" name="date_of_birth" class="form-control" id="date_of_birth" value="{{ Request::old('date_of_birth') ?: $user->date_of_birth }}">
                    @if( $errors->has('date_of_birth') )
                        <span class="help-block">{{ $errors->first('date_of_birth') }}</span>
                    @endif
                </div>

                <div class="col-lg-12">
                    <div class="form-group{{ $errors->has('information') ? ' has-error' : ''}}">
                        <label for="information" class="control-label">Information</label>
                        <textarea name="information" class="form-control" id="information" rows="3" maxlength="200">{{ Request::old('information') ?: $user->information }}</textarea>
                        @if( $errors->has('information') )
                            <span class="help-block">{{ $errors->first('information') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="Update">
                        <a class="btn btn-default" href="{{ route('admin.users') }}">Back</a>
                    </div>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
        </div>
    </div>
@stop