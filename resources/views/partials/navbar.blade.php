<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- User Profile -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('profiles.show') }}">
                <i class="fas fa-user"></i> {{ Auth::user()->name }}
            </a>
        </li>
    </ul>
</nav>
