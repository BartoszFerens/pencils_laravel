<div class="row p-0 border-bottom">
    <div class="col-10">
        <ul class="nav nav-tabs" style="border-bottom: 0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                    aria-expanded="false">Dropdown</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('admin.users.index') }}">Users</a></li>
                    <li><a class="dropdown-item" href="{{ route('admin.products.index') }}">Products & Categories</a></li>
                    <li><a class="dropdown-item" href="{{ route('admin.brands.index') }}">Brands</a></li>
                    <li><a class="dropdown-item" href="{{ route('admin.orders.index') }}">Orders</a></li>
                    <li><a class="dropdown-item" href="{{ route('admin.invoices.index') }}">Invoices</a></li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li><a class="dropdown-item" href="#">User Management</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/">Show webshop</a>
            </li>
        </ul>
    </div>
    <div class="col-2">
        @auth
            <div class="text-end pe-2 mt-2">
                <a href="#">{{ Auth()->user()->first_name }}&nbsp;{{ Auth()->user()->last_name }}</a>
                <a href="{{ route('admin.logout') }}" class="pl-3">
                    <img src="/images/switch.png" width="16px">
                </a>
            </div>
        @endauth
    </div>
</div>
