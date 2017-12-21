@extends('templates.default')

@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <a href="{{ route('material.index', ['materialId'=>$material->id]) }}" class="pull-left">
                <h2>{{ $material->getTitle() }}</h2>
                <img src="{{ $material->getImage() }}" class="material">
            </a>
            <p class="col-lg-12">
                {{ $material->getBody() }}
            </p>
        </div>

    </div>
@stop