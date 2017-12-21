@extends('templates.default')

@section('content')
    <div class="container col-lg-12 materials">
        @foreach($materials as $material)
            <div class="col-lg-4 item">
                <img class="material" src="{{ $material->getImage() }}" alt="{{ $material->getTitle() }}">
                <h2>{{ $material->getTitle() }}</h2>
                <p>{{ $material->description }}</p>
                @if(!empty($material->getUrl()))
                    <a class="btn btn-primary" href="{{ $material->getUrl() }}">Source</a>
                @endif
                <a class="btn btn-default" href="{{ route('material.index', ['materialId'=>$material->id]) }}">More</a>
            </div>
        @endforeach
    </div>
@stop