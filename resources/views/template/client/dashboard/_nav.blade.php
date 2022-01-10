<nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top" data-aos="fade-down" >
    <div class="container-fluid">
        <button class="btn btn-secondary d-md-none me-auto me-2" id="menu-toggle" >
            &laquo; Menu
        </button>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- desktop menu -->
        <ul class="navbar-nav d-none d-lg-flex ms-auto">
            <li class="nav-item dropdown">
            <a href="#" class="nav-link" id="navbarDropdown" data-bs-toggle="dropdown">
                    <img src="/images/icon-user.png" class="rounded-circle me-2 profile-picture" alt="" />
                    Hi, {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu">
                    <a href="{{ route('dashboard') }}" class="dropdown-item">Dashboard</a>
                    <a href="{{ route('account-setting') }}" class="dropdown-item">Settings</a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">Logout</a>
                </div>
            </li>
            <li class="nav-item">
                <a href="{{ route('cart') }}" class="nav-link d-inline-block mt-2">
                    @php
                        $carts = \App\Models\Cart::where('users_id', Auth::user()->id)->count();
                    @endphp
                    @if ($carts)
                    <img src="/images/icon-cart-filled.svg" alt="" />
                    <div class="card-badge">{{ $carts }}</div>
                    @else
                    <img src="/images/icon-cart-empty.svg" alt="" />
                    @endif
                </a>
            </li>
        </ul>

        <ul class="navbar-nav d-block d-lg-none">
            <li class="nav-item">
                <a href="#" class="nav-link">Hi, {{ Auth::user()->name }}</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link d-inline-block">Cart</a>
            </li>
        </ul>
        </div>
    </div>
    <form action="{{ route('logout') }}" id="logout-form" method="POST" class="d-none">@csrf</form>
</nav>