<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="/">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item nav-category">Services</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="menu-icon  fa fa-shopping-bag"></i>
                <span class="menu-title">Products</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cake') }}">
                            Cake
                        </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('catering') }}">Catering
                            Service</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item nav-category">Order & Rentals</li>
        <li class="nav-item">
            <a class="nav-link" href="/">
                <i class="mdi mdi-cake menu-icon"></i>
                <span class="menu-title">Cake Orders</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/">
                <i class="mdi mdi-tent menu-icon"></i>
                <span class="menu-title">Rentals</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/">
                <i class="mdi mdi-calendar menu-icon"></i>
                <span class="menu-title">Ongoing Events</span>
            </a>
        </li>
        <li class="nav-item nav-category">Inventory</li>
        <li class="nav-item">
            <a class="nav-link" href="/">
                <i class="mdi mdi-file-cog-outline menu-icon"></i>
                <span class="menu-title">Cake Inventory</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/">
                <i class="mdi mdi-file-cog-outline menu-icon"></i>
                <span class="menu-title">Rental Inventory</span>
            </a>
        </li>
    </ul>
</nav>
