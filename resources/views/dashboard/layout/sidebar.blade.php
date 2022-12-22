<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        {{-- dashboard item --}}
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}"
                class="nav-link
            @if (\Request::route()->getName() == 'admin.dashboard') active @endif">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        {{-- users item --}}
        <li class="nav-item">
            <a href="{{ route('admin.users.index') }}"
                class="nav-link
            @if (\Request::route()->getName() == 'admin.users.index') active @endif">
                <i class="mdi mdi-account menu-icon"></i>
                <span class="menu-title">Users</span>
            </a>
        </li>
        {{-- categories item --}}
        <li class="nav-item">
            <a href="{{ route('admin.categories.index') }}"
                class="nav-link
            @if (\Request::route()->getName() == 'admin.categories.index') active @endif">
                <i class="mdi mdi-apps menu-icon"></i>
                <span class="menu-title">Categories</span>
            </a>
        </li>
        {{-- products item --}}
        <li class="nav-item">
            <a href="{{ route('admin.products.index') }}"
                class="nav-link
            @if (\Request::route()->getName() == 'admin.products.index') active @endif">
                <i class="mdi mdi mdi-basket menu-icon"></i>
                <span class="menu-title">Products</span>
            </a>
        </li>
        {{-- Logout item --}}
        <li class="nav-item">
            <a href="#" class="nav-link
            @if (\Request::route()->getName() == '#') active @endif"
                onclick="$('#logout').submit()">
                <i class="mdi mdi-logout-variant menu-icon"></i>
                <span class="">Logout</span>
            </a>
            <form action="{{ route('logout') }}" id="logout" method="POST">
                @csrf
            </form>
        </li>
    </ul>
</nav>
