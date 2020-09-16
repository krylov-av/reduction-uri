<nav class="navbar navbar-dark bg-dark">
    <!-- Navbar content -->
    <h1 class="pl-4">Hi, {{ Auth::user()->name }}</h1>
    <div class="form-inline my-2 my-lg-0">
        <a class="btn btn-outline-primary mr-2" href="{{ route('links.create') }}">Add link</a>
        <a class="btn btn-outline-primary mr-2" href="{{ route('logout') }}">Logout</a>
    </div>
</nav>
