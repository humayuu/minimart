<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MiniMart</title>

    {{-- Bootstrap Css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css"
        integrity="sha512-QeR2VH+lsBE5LSAe1Q5EnTBbe7XTBubt8dG93Y7gidSgdMCr8nVqKcfKAMyN96SV8KDbZVTDXChatu5G2KQGzg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/styles.css') }}">
</head>

<body>

    {{-- Top bar --}}
    <div class="bg-dark text-light py-1 d-none d-md-block">
        <div class="container d-flex justify-content-between small">
            <span><i class="fa-solid fa-truck-fast me-1"></i> Free delivery on orders over Rs. 2000</span>
            <span><i class="fa-solid fa-phone me-1"></i> +92 300 1234567</span>
        </div>
    </div>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand text-primary" href="{{ url('/') }}">
                <i class="fa-solid fa-cart-shopping me-1"></i> MiniMart
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNav">
                {{-- Category dropdown --}}
                <ul class="navbar-nav me-3">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fa-solid fa-bars me-1"></i> Categories
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Electronics</a></li>
                            <li><a class="dropdown-item" href="#">Groceries</a></li>
                            <li><a class="dropdown-item" href="#">Fashion</a></li>
                            <li><a class="dropdown-item" href="#">Home &amp; Living</a></li>
                            <li><a class="dropdown-item" href="#">Beauty &amp; Care</a></li>
                        </ul>
                    </li>
                </ul>

                {{-- Search --}}
                <form class="d-flex flex-grow-1 mx-lg-3 my-2 my-lg-0">
                    <input class="form-control" type="search" placeholder="Search products, brands...">
                    <button class="btn btn-primary ms-2" type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>

                {{-- Right nav --}}
                <ul class="navbar-nav ms-auto align-items-lg-center gap-1">
                    {{-- Account Dropdown --}}
                    <li class="nav-item dropdown">
                        @guest
                            <a class="nav-link dropdown-toggle" href="#" id="accountDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-regular fa-user me-1"></i> Account
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="accountDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ url('/login') }}">
                                        <i class="fa-solid fa-right-to-bracket me-2 text-muted"></i>Login
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ url('/signup') }}">
                                        <i class="fa-solid fa-user-plus me-2 text-muted"></i>Signup
                                    </a>
                                </li>
                            </ul>
                        @endguest

                        @auth
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-regular fa-user me-1"></i> {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="userDropdown">
                                @if (Auth::user()->roles !== 'Customer')
                                    <li>
                                        <a class="dropdown-item fw-semibold text-primary" href="{{ route('dashboard') }}">
                                            <i class="fa-solid fa-gauge me-2"></i>Admin Dashboard
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                @endif
                                <li>
                                    <a class="dropdown-item" href="{{ route('profile') }}">
                                        <i class="fa-regular fa-id-badge me-2 text-muted"></i>Profile
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('change.password') }}">
                                        <i class="fa-solid fa-key me-2 text-muted"></i>Change Password
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}" class="m-0">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">
                                            <i class="fa-solid fa-right-from-bracket me-2"></i>Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        @endauth
                    </li>

                    {{-- Wishlist --}}
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa-regular fa-heart me-1"></i> Wishlist
                        </a>
                    </li>

                    {{-- Cart --}}
                    <li class="nav-item">
                        <a class="nav-link position-relative pe-3" href="#">
                            <i class="fa-solid fa-cart-shopping me-1"></i> Cart
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                3
                                <span class="visually-hidden">items in cart</span>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Brand strip --}}
    <div class="bg-white border-bottom py-2">
        <div class="container d-flex gap-2 overflow-auto">
            <span class="badge rounded-pill bg-light text-dark border px-3 py-2">Nestle</span>
            <span class="badge rounded-pill bg-light text-dark border px-3 py-2">Unilever</span>
            <span class="badge rounded-pill bg-light text-dark border px-3 py-2">Samsung</span>
            <span class="badge rounded-pill bg-light text-dark border px-3 py-2">LG</span>
            <span class="badge rounded-pill bg-light text-dark border px-3 py-2">Nike</span>
            <span class="badge rounded-pill bg-light text-dark border px-3 py-2">Adidas</span>
            <span class="badge rounded-pill bg-light text-dark border px-3 py-2">P&amp;G</span>
        </div>
    </div>

    @yield('main')

    {{-- Footer --}}
    <footer class="pt-5 pb-3 mt-5">
        <div class="container">
            <div class="row gy-4">
                <div class="col-md-4">
                    <h5 class="text-white">MiniMart</h5>
                    <p class="small">Your everyday shopping partner. Quality products, fair prices, fast delivery.</p>
                </div>
                <div class="col-md-4">
                    <h6 class="text-white">Quick Links</h6>
                    <ul class="list-unstyled small">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Terms &amp; Conditions</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h6 class="text-white">Follow Us</h6>
                    <div class="d-flex gap-3 fs-5">
                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>
            <hr class="border-secondary my-4">
            <p class="text-center small mb-0">&copy; 2026 MiniMart. All rights reserved.</p>
        </div>
    </footer>

    {{-- Bootstrap Js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>
