@extends('templates.default')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('templates.partials.sidebar')

            <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
                <h1>Dashboard</h1>

                <section class="row text-center placeholders">
                    <div class="col-6 col-sm-6 placeholder">
                        <a href="{{ route('admin.users') }}">
                            <img class="admin-cat" src="{{ asset('storage/users.png') }}" alt="Users">
                            <h3>
                                Users
                            </h3>
                        </a>
                            <div class="text-muted">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('admin.users') }}"><i class="glyphicon glyphicon-list"></i> All users</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><i class="glyphicon glyphicon-plus"></i> Create new user</a>
                                    </li>
                                </ul>
                            </div>
                    </div>
                    <div class="col-6 col-sm-6 placeholder">
                        <a href="{{ route('admin.materials') }}">
                            <img class="admin-cat" src="{{ asset('storage/materials.png') }}" alt="Materials">
                            <h3>
                                Materials
                            </h3>
                        </a>
                            <span class="text-muted">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('admin.materials') }}"><i class="glyphicon glyphicon-list"></i> All materials</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('admin.create.material') }}"><i class="glyphicon glyphicon-plus"></i> Create new material</a>
                                    </li>
                                </ul>
                            </span>
                    </div>
                </section>
            </main>
        </div>
    </div>
@stop