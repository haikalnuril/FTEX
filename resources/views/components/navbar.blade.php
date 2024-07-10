<nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#">Navbar</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        @if (Auth::check())
                        <a href="{{ route('logout') }}" class="btn btn-outline-light">Logout</a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>