<!-- Start Header/Navigation -->
<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">DucAnh<span>.</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
            aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsFurni">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li><a class="nav-link" href="{{ route('shop') }}">Shop</a></li>
                <li><a class="nav-link" href="{{ route('about') }}">About us</a></li>
                <li><a class="nav-link" href="{{ route('services') }}">Services</a></li>
                <li><a class="nav-link" href="{{ route('blog') }}">Blog</a></li>
                <li><a class="nav-link" href="{{ route('contact') }}">Contact us</a></li>
            </ul>

            <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                @if (Auth::guard('cus')->check())
                    <li class="nav-link user-name"
                        style="
                    font-weight: 600;
                    cursor: pointer;
                ">
                        {{ Auth::guard('cus')->user()->name }}
                        <ul class="submenu">
                            <li><a href="{{ route('logOut') }}">LogOut</a></li>
                        </ul>
                    </li>
                    <a class="nav-link cart" href="{{ route('cart') }}">
                        <img src="{{ asset('template/client/images/cart.svg') }}">
                    </a>
                @else
                    <li class="nav-link">
                        <a href="{{ route('client_signIn') }}">
                            <img src="{{ asset('template/client/images/user.svg') }}">
                        </a>
                    </li>
                    <li class="nav-link cart-link">
                        <a href="{{ route('cart') }}">
                            <img src="{{ asset('template/client/images/cart.svg') }}">
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
@yield('nav')
