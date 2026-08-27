<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiniMart Admin</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
</head>

<body>

    <div class="d-flex" style="min-height: 100vh;">

        <!-- Sidebar -->
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; min-height: 100vh;">

            <!-- Brand -->
            <a href="{{ route('dashboard') }}"
                class="d-flex justify-content-center mt-2 mb-3 text-white text-decoration-none">

                <i class="fa-solid fa-store me-2 fs-4"></i>

                <span class="fs-4 fw-bold">
                    MiniMart
                </span>
            </a>

            <hr>

            <!-- Navigation -->
            <ul class="nav nav-pills flex-column mb-auto">

                <!-- Dashboard -->
                <li class="nav-item mb-1">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }} text-white">
                        <i class="fa-solid fa-gauge me-2"></i>
                        Dashboard
                    </a>
                </li>

                <!-- Brands -->
                <li class="nav-item mb-1">
                    <a href="{{ route('brand.index') }}"
                        class="nav-link {{ request()->routeIs('brand.*') ? 'active' : '' }} text-white">
                        <i class="fa-solid fa-tag me-2"></i>
                        Brands
                    </a>
                </li>

                <!-- Categories -->
                <li class="nav-item mb-1">
                    <a href="{{ route('category.index') }}"
                        class="nav-link {{ request()->routeIs('category.*') ? 'active' : '' }} text-white">
                        <i class="fa-solid fa-folder-tree me-2"></i>
                        Categories
                    </a>
                </li>

                <!-- Products -->
                <li class="nav-item mb-1">
                    <a href="{{ route('product.index') }}"
                        class="nav-link {{ request()->routeIs('product.*') ? 'active' : '' }} text-white">
                        <i class="fa-solid fa-box me-2"></i>
                        Products
                    </a>
                </li>

                <!-- Orders -->
                <li class="nav-item mb-1">
                    <a href="/orders" class="nav-link text-white">
                        <i class="fa-solid fa-cart-shopping me-2"></i>
                        Orders
                    </a>
                </li>

                <!-- Users -->
                <li class="nav-item mb-1">
                    <a href="/users" class="nav-link text-white">
                        <i class="fa-solid fa-users me-2"></i>
                        Users
                    </a>
                </li>

                <!-- Settings -->
                <li class="nav-item mb-1">
                    <a href="/settings" class="nav-link text-white">
                        <i class="fa-solid fa-gear me-2"></i>
                        Settings
                    </a>
                </li>

            </ul>

            <hr>

            <!-- Admin -->
            <div class="dropdown">

                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                    data-bs-toggle="dropdown">

                    <img src="https://ui-avatars.com/api/?name=Admin&background=random" width="32" height="32"
                        class="rounded-circle me-2" alt="Admin">

                    <strong>Admin</strong>

                </a>

                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">

                    <li>
                        <a class="dropdown-item" href="/profile">
                            <i class="fa-solid fa-user me-2"></i>
                            Profile
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="/change-password">
                            <i class="fa-solid fa-key me-2"></i>
                            Change Password
                        </a>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item" href="/logout">
                            <i class="fa-solid fa-right-from-bracket me-2"></i>
                            Logout
                        </a>
                    </li>

                </ul>

            </div>

        </div>


        @yield('main')

    </div>


    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</body>

</html>
