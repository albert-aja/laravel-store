<div class="border-right" id="sidebar-wrapper">
    <div class="sidebar-heading text-center">
        <img src="/images/admin.png" class="my-4 admin-logo"/>
    </div>
    <div class="list-group list-group-flush">
        <a href="{{ route('admin-dashboard') }}" class="list-group-item active">Dashboard</a>
        <a href="{{ route('product') }}" class="list-group-item">Products</a>
        <a href="{{ route('transactions') }}" class="list-group-item">Categories</a>
        <a href="{{ route('setting') }}" class="list-group-item">Users</a>
        <a href="/index.html" class="list-group-item">Sign Out</a>
    </div>
</div>