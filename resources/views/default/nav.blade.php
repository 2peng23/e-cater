<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
    <a href="/" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <img src="content/logo/b-logo.png" class="d-none d-md-block " alt="" style="width:100px;">
        <small class="m-0 fw-bolder text-primary" style="font-size: 15px">Murillo Cake Haus <br /> and Catering
            Services</small>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0" id="navBar">
            <a href="/" class="nav-item nav-link">Home</a>
            <a href="about.html" class="nav-item nav-link">About</a>
            <a href="service.html" class="nav-item nav-link">Cakes</a>
            <a href="project.html" class="nav-item nav-link">Services</a>
            {{-- <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                <div class="dropdown-menu fade-up m-0">
                    <a href="feature.html" class="dropdown-item">Feature</a>
                    <a href="quote.html" class="dropdown-item">Free Quote</a>
                    <a href="team.html" class="dropdown-item">Our Team</a>
                    <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                    <a href="404.html" class="dropdown-item">404 Page</a>
                </div>
            </div> --}}
            @if (Auth::check())
                <a href="{{ route('cart-items') }}"
                    class="nav-item nav-link position-relative {{ request()->routeIs('cart-items') ? 'active' : '' }}">
                    <p class="position-absolute fw-bolder" style="top: 5px; right:0">
                        @php
                            $cart_count = App\Models\Cart::where('cart_id', Auth::user()->id)->count();
                        @endphp
                        {{ $cart_count }}
                    </p>
                    <i class="fa fa-shopping-cart fs-4 text-primary"></i>
                </a>
                <div class="nav-item nav-link " style="border-radius: 50%">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="bg-primary text-white px-3 py-2" href="#" data-toggle="modal"
                            data-target="#logoutModal" :href="route('logout')"
                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </form>
                </div>
            @else
                <div class="nav-item nav-link " style="border-radius: 50%">
                    <a href="/login" class="bg-primary text-white px-3 py-2">Login</a>
                </div>
                <div class="nav-item nav-link">
                    <a href="/register" class="bg-primary text-white px-3 py-2">Register</a>
                </div>
            @endif

        </div>
    </div>
</nav>
<!-- Navbar End -->
