@extends('templates.default')

@section('content')
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="media">
                <a href="{{ $user->getAvatarUrl() }}" class="pull-left">
                    <img src="{{ $user->getAvatarUrl() }}" alt="ava" class="media-object avatar-lg">
                </a>
                <div class="media-body">
                    <div class="col-lg-12">
                        <h4 class="media-heading"><a href="{{ route('profile.index', ['user_id' => $user->id]) }}">{{ $user->getName() }}</a></h4>
                        <h5>{{ $user->nickname }}</h5>
                        @if($user->date_of_birth)
                            <p>{{ $user->date_of_birth }}</p>
                        @endif
                    </div>
                    @if(!empty($user->information))
                        <div class="col-lg-12">
                            <p>{{ $user->information }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
@stop