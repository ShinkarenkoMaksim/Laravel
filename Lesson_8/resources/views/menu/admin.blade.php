<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">НашиНовости</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link {{ request()->routeIs('admin.create')?'active':'' }}" href="{{ route('admin.create') }}">Добавить новость</a>
                <a class="nav-item nav-link {{ request()->routeIs('admin.test1')?'active':'' }}" href="{{ route('admin.test1') }}">text</a>
                <a class="nav-item nav-link {{ request()->routeIs('admin.test2')?'active':'' }}" href="{{ route('admin.test2') }}">json</a>
            </div>
        </div>
    </div>
</nav>

