<nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('admin.index') }}"><i class="glyphicon glyphicon-dashboard"></i> Overview</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.users') }}"><i class="glyphicon glyphicon-user"></i> Users</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.materials') }}"><i class="glyphicon glyphicon-file"></i> Materials</a>
        </li>
    </ul>
</nav>