<div class="border-right" id="sidebar-wrapper">
    <div class="sidebar-heading text-center">
        <img src="/images/admin.png" class="my-4 admin-logo"/>
    </div>
    <div class="list-group list-group-flush">
        <a href="{{ route('admin-dashboard') }}" class="list-group-item {{ (request()->is('Admin') ? 'active' : '') }}">Dashboard</a>
        <a href="{{ route('Category.index') }}" class="list-group-item {{ (request()->is('Admin/Category*') ? 'active' : '') }}">Categories</a>
        <a href="{{ route('Product.index') }}" class="list-group-item {{ (request()->is('Admin/Product*') ? 'active' : '') }}">Products</a>
        <a href="{{ route('Gallery.index') }}" class="list-group-item {{ (request()->is('Admin/Gallery*') ? 'active' : '') }}">Galleries</a>
        <a href="{{ route('User.index') }}" class="list-group-item {{ (request()->is('Admin/User*') ? 'active' : '') }}">Users</a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="list-group-item">Sign Out</a>
        <form action="{{ route('logout') }}" id="logout-form" method="POST" class="d-none">@csrf</form>
    </div>
</div>