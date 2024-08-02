<nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="#">FTEX</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Menu items lain di sini -->
        </div>
        @if (Auth::check())
        <a href="{{ route('logout') }}" class="btn btn-outline-light ms-2">Logout</a>
        @endif
    </div>
</nav>