<nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top"data-aos="fade-down">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand">
            <img src="/images/dashboard-store-logo.svg" alt="logo" class="navbar-logo" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item active">
                    <a href="{{ route('home') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('categories') }}" class="nav-link">Category</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">Rewards</a>
                </li>
                @guest
                <li class="nav-item">
                    <a href="{{ route('register') }}" class="nav-link">Sign Up</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="btn btn-success nav-link text-white px-4">Sign In</a>
                </li>
                @endguest
                @auth
                <!-- desktop menu -->
                <ul class="navbar-nav d-none d-lg-flex">
                    <li class="nav-item dropdown">
                        <a href="" class="nav-link" id="navbarDropdown" data-bs-toggle="dropdown">
                            <img src="/images/icon-user.png" class="rounded-circle me-2 profile-picture"/>Hi, {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu">
                            <a href="{{ route('dashboard') }}" class="dropdown-item">Dashboard</a>
                            <a href="{{ route('setting') }}" class="dropdown-item">Settings</a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">Logout</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link d-inline-block mt-2">
                            <img src="/images/icon-cart-empty.svg" alt="" />
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav d-block d-lg-none">
                    <li class="nav-item">
                        <a href="#" class="nav-link">Hi, User</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link d-inline-block">Cart</a>
                    </li>
                </ul>
                @endauth
            </ul>
        </div>
    </div>
</nav>