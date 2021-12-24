<div class="border-right" id="sidebar-wrapper">
    <div class="sidebar-heading text-center">
        <img src="/images/dashboard-store-logo.svg" class="my-4" />
    </div>
    <div class="list-group list-group-flush">
        <a href="{{ route('dashboard') }}" class="list-group-item active">Dashboard</a>
        <a href="{{ route('product') }}" class="list-group-item">My Products</a>
        <a href="{{ route('transactions') }}" class="list-group-item">Transactions</a>
        <a href="{{ route('setting') }}" class="list-group-item">Store Settings</a>
        <a href="{{ route('account') }}" class="list-group-item">My Account</a>
        <a href="/index.html" class="list-group-item">Sign Out</a>
    </div>
</div>