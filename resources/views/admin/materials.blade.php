@extends('templates.default')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('templates.partials.sidebar');

            <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
                <h1>Materials
                    <a class="btn btn-primary " href="{{ route('admin.create.material') }}">
                        <i class="glyphicon glyphicon-plus"></i>
                    </a>
                </h1>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Url</th>
                            <th>Image</th>
                            <th>Visible</th>
                            <th>Settings</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($materials as $material)
                            <tr>
                                <td>{{ $material->id }}</td>
                                <td>{{ $material->getTitle() }}</td>
                                <td>{{ $material->getDescription() }}</td>
                                <td><a href="{{ $material->getUrl() }}">{{ $material->getUrl() }}</a></td>
                                <td><img class="material-preview" src="{{ $material->getImage() }}" alt="image"></td>
                                <td><i class="glyphicon glyphicon-{{ $material->isVisible() ? 'ok': 'remove'}}"></i></td>
                                <td>
                                    <a href="{{ route('admin.edit.material', ['material_id' => $material->id]) }}">
                                        <i class="glyphicon glyphicon-edit"></i>
                                    </a>
                                    <a href="{{ route('admin.delete.material', ['material_id' => $material->id]) }}">
                                        <i class="glyphicon glyphicon-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
@stop