@extends('templates.default')

@section('content')
    <div class="container">
        <div class="col-lg-6 col-lg-offset-3">
            <h3>Edit material</h3>
            <form enctype="multipart/form-data" name="info" role="form" method="post" action="{{ route('admin.edit.material', ['material_id' => $material->id]) }}" class="form-vertical">
                <div class="form-group{{ $errors->has('title') ? ' has-error' : ''}} col-lg-10">
                    <label for="title" class="control-label">Title</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{ Request::old('title') ?: $material->title }}">
                    @if( $errors->has('title') )
                        <span class="help-block">{{ $errors->first('title') }}</span>
                    @endif
                </div>
                <div class="form-group col-lg-2">
                    <label for="show" class="control-label">Visible</label>
                    <input type="checkbox" name="show" class="form-control" id="show" {{ $material->isVisible() ? 'checked' : '' }}>
                </div>
                <div class="form-group{{ $errors->has('url') ? ' has-error' : ''}} col-lg-12">
                    <label for="url" class="control-label">Url</label>
                    <input type="url" name="url" class="form-control" id="url" value="{{ Request::old('url') ?: $material->url }}">
                    @if( $errors->has('url') )
                        <span class="help-block">{{ $errors->first('url') }}</span>
                    @endif
                </div>

                <div class="image-upload">
                    <div class="form-group col-lg-6">
                        <label for="image" class="control-label">
                            Image
                        </label>
                        <input type="file" name="image" class="form-control" id="image">
                    </div>
                    <div class="col-lg-6">
                        <img class="image-preview" src="{{ $material->getImage() }}" alt="image">
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group{{ $errors->has('description') ? ' has-error' : ''}}">
                        <label for="information" class="control-label">Description</label>
                        <textarea name="description" class="form-control" id="description" rows="3" maxlength="200">{{ Request::old('description') ?: $material->description }}</textarea>
                        @if( $errors->has('description') )
                            <span class="help-block">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('body') ? ' has-error' : ''}}">
                        <label for="information" class="control-label">Body</label>
                        <textarea name="body" class="form-control" id="body" rows="16" maxlength="1000">{{ Request::old('body') ?: $material->body }}</textarea>
                        @if( $errors->has('body') )
                            <span class="help-block">{{ $errors->first('body') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="Update">
                        <a class="btn btn-default" href="{{ route('admin.materials') }}">Back</a>
                    </div>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
        </div>
    </div>
@stop