[ navigation menu ] start -->
<nav class="pcoded-navbar">
    <div class="navbar-wrapper">
        <div class="navbar-brand header-logo">
            <a href="index.html" class="b-brand">
                <div class="b-bg">
                    <i class="feather icon-trending-up"></i>
                </div>
                <span class="b-title">Clienex</span>
            </a>
            <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
        </div>
        <div class="navbar-content scroll-div">

            <ul class="nav pcoded-inner-navbar">
                <li class="nav-item pcoded-menu-caption">
                    <label>Navigation</label>
                </li>

                {{-- MANAGER AUTH --}}
                @can('manager', auth()->user())
                <li data-username="Outlets" class="nav-item {{ request()->is('outlets/*/list') ? 'active' : '' }}">
                    @if(auth()->user()->load('organisation'))
                    <a href="{{ route('outlet.index', auth()->user()->organisation_id) }}" class="nav-link"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Manage Outlets</span></a>
                    @endif
                </li>

                {{-- MANAGE EMPLOYEES  --}}
                <li data-username="Employees" class="nav-item pcoded-hasmenu {{ request()->is('employee') || request()->is('create/employee') || request()->is('edit/employee/*') || request()->is('employee/status') ? 'active pcoded-trigger' : '' }}  ">
                    <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-menu "></i></span><span class="pcoded-mtext">Employees</span></a>
                    <ul class="pcoded-submenu">
                        <li class="{{ request()->is('employee') || request()->is('create/employee') || request()->is('edit/employee/*')  ? 'active' : '' }}"><a href="{{ route('user.index') }}" class="">List Employee</a></li>
                        <li class="{{ request()->is('employee/status') ? 'active' : '' }}"><a href="{{ route('user.status') }}" class="">Employee Status</a></li>
                    </ul>
                </li>
                @endcan
                
                @if(request()->is('products/*/list') || request()->is('product/*/types') || request()->is('product/*/category') || request()->is('inventory/*') )
                {{-- INVENTORY--}}
                <li data-username="Inventory" class="nav-item {{ request()->is('inventory/*') ? 'active' : '' }}">
                    <a href="{{ route('inventory.index', request()->segment(2)) }}" class="nav-link"><span class="pcoded-micon"><i class="feather icon-menu "></i></span><span class="pcoded-mtext">Inventory</span></a>
                </li>

                {{-- MANAGE PRODUCT  --}}
                <li data-username="Product" class="nav-item pcoded-hasmenu {{ request()->is('product/*/types') || request()->is('product/*/category') || request()->is('create/product') || request()->is('products/*/list') || request()->is('products/*/edit') ? 'active pcoded-trigger' : '' }}">
                    <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-menu "></i></span><span class="pcoded-mtext">Products</span></a>
                    <ul class="pcoded-submenu">

                        {{-- List Products --}}
                        <li class="{{ request()->is('products/*/list') ? 'active' : '' }}"><a href="{{ route('product.index', request()->segment(2)) }}" class="">List Products</a></li>
                        
                        {{-- Product Types --}}
                        <li class="{{ request()->is('product/*/types') ? 'active' : '' }}"><a href="{{ route('type.index', request()->segment(2)) }}" class="">Product Types</a></li>

                        {{-- Product Categories --}}
                        <li class="{{ request()->is('product/*/category') ? 'active' : '' }}"><a href="{{ route('cat.index', request()->segment(2)) }}" class="">Product Categories</a></li>
                    </ul>
                </li>
                @endif

                {{-- SUPER ADMIN AUTH --}}
                @can('admin', auth()->user())
                {{-- MANAGE SUPER-ADMIN --}}
                <li data-username="Outlets" class="nav-item {{ request()->is('organisations') || request()->is('organisation/create') || request()->is('organisations/*/edit') ? 'active': ''}}">

                    <a href="{{ route('org.index') }}" class="nav-link"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Organisations</span></a>
                </li>

                {{-- MANAGE ROLES --}}
                <li data-username="Outlets" class="nav-item {{ request()->is('roles') || request()->is('add/role') || request()->is('role/*/edit') ? 'active' : '' }}">
                    <a href="{{ route('role.index') }}" class="nav-link"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Manage Roles</span></a>
                </li>

                {{-- MANGE ORGANISATION USERS --}}
                <li data-username="Outlets" class="nav-item {{ request()->is('admin/list') || request()->is('add/new/admin') || request()->is('admin/*/edit') ? 'active' : '' }}">

                    <a href="{{ route('company.index') }}" class="nav-link"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Manage Users</span></a>
                </li>
                @endcan

                <li data-username="Disabled Menu" class="nav-item disabled"><a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-power"></i></span><span class="pcoded-mtext">Logout</span></a></li>
            </ul>
        </div>
    </div>
</nav>
    <!-- [ navigation menu ] end