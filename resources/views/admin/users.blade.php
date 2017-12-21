@extends('templates.default')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('templates.partials.sidebar');

            <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
                <h1>Users</h1>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Nickname</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>DoB</th>
                            <th>Information</th>
                            <th>Enabled</th>
                            <th>Settings</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->getName() }}</td>
                                <td>{{ $user->getNickName() }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->getRole() }}</td>
                                <td>{{ $user->date_of_birth }}</td>
                                <td>{{ $user->information }}</td>
                                <td><i class="glyphicon glyphicon-{{ $user->validate ? 'ok': 'remove'}}"></i></td>
                                <td>
                                    <a href="{{ route('admin.edit.user', ['user_id' => $user->id]) }}">
                                        <i class="glyphicon glyphicon-edit"></i>
                                    </a>
                                    <a href="{{ route('admin.delete.user', ['user_id' => $user->id]) }}">
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