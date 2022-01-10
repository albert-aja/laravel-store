<div class="border-right" id="sidebar-wrapper">
    <div class="sidebar-heading text-center">
        <img src="/images/dashboard-store-logo.svg" class="my-4" />
    </div>
    <div class="list-group list-group-flush">
        <a href="{{ route('dashboard') }}" class="list-group-item {{ (request()->is('Dashboard')) ? 'active' : '' }}">Dashboard</a>
        <a href="{{ route('product') }}" class="list-group-item {{ (request()->is('Dashboard/Product*')) ? 'active' : '' }}">My Products</a>
        <a href="{{ route('transactions') }}" class="list-group-item {{ (request()->is('Dashboard/Transactions*')) ? 'active' : '' }}">Transactions</a>
        <a href="{{ route('store-setting') }}" class="list-group-item {{ (request()->is('Dashboard/Setting')) ? 'active' : '' }}">Store Settings</a>
        <a href="{{ route('account-setting') }}" class="list-group-item {{ (request()->is('Dashboard/Account*')) ? 'active' : '' }}">My Account</a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="list-group-item">Sign Out</a>
        <form action="{{ route('logout') }}" id="logout-form" method="POST" class="d-none">@csrf</form>
    </div>
</div>