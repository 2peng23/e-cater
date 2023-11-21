<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row shadow">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                <span class="icon-menu"></span>
            </button>
        </div>
        <div>
            <a href="/" class="navbar-brand brand-logo">
                {{-- <div class="d-flex"> --}}
                <p class="fw-bold">Murillo Cake Haus <br>& Catering Services</p>
                {{-- <img src="content/logo/b-logo.png" alt="" style="width: 300px"> --}}
                {{-- </div> --}}
            </a>
        </div>
        {{-- <div>
            <a class="navbar-brand brand-logo" href="index.html">
                <img src="content/logo/b-logo.png" alt="logo" />
            </a>
            <a class="navbar-brand brand-logo-mini" href="index.html">
                <img src="content/logo/b-logo.png" alt="logo" />
            </a>
        </div> --}}
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-top">
        <ul class="navbar-nav">
            <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                <h1 class="welcome-text">Good Day, <span class="text-black fw-bold">{{ Auth::user()->name }}!</span>
                </h1>
                {{-- <h3 class="welcome-sub-text">Your performance summary this week </h3> --}}
            </li>
        </ul>
        <ul class="navbar-nav ms-auto">
            {{-- search --}}
            {{-- <li class="nav-item">
                <form class="search-form" action="#">
                    <i class="icon-search"></i>
                    <input type="search" class="form-control" placeholder="Search Here" title="Search here">
                </form>
            </li> --}}
            <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-user-circle fs-2"></i> </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                    <div class="dropdown-header text-center">
                        <p class="mb-1 mt-3 font-weight-semibold">{{ Auth::user()->name }}</p>
                        <p class="fw-light text-muted mb-0">{{ Auth::user()->email }}</p>
                    </div>
                    {{-- <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign
                        Out</a> --}}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item" href="#" :href="route('logout')"
                            onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            <i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>
                            Signout
                        </a>
                    </form>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-bs-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
