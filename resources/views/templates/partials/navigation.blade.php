<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('home') }}">3d Modeling</a>
        </div>

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::check())
                    <li><a href="{{ route('home') }}"><b>Feed</b></a></li>
                    <form class="navbar-form navbar-left" role="search" action="{{ route('search.results') }}">
                        <div class="form-group">
                            <input type="text" name="query" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default">Search</button>
                    </form>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ Auth::user()->getAvatarUrl() }}" alt="ava" class="avatar-mini">
                            <b>{{ Auth::user()->getName() }}</b>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('profile.index'/*, ['user_id' => Auth::user()->id]*/) }}">Profile</a></li>
                            <li><a href="{{ route('profile.edit') }}">Edit profile</a></li>
                            @if(Auth::user()->role == 'admin')
                                <li><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            @endif
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('auth.signout') }}">Sign out</a></li>
                        </ul>
                    </li>

                @else
                    @if(Route::currentRouteName() != 'auth.signup')
                        <li><a href="{{ route('auth.signup') }}">Sign up</a></li>
                    @else
                        <li><a href="{{ route('home') }}">Sign in</a></li>
                    @endif
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>