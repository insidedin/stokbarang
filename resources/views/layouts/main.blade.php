<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('name')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Styling tambahan untuk mempercantik sidebar */
        .sidebar {
            background-color: #1c1cc8;
            min-height: 100vh;
            min-width: 35vh;
            color: #737373;
        }

        .sidebar .nav-link {
            color: #e2e2e2;
            transition: background-color 0.3s ease;
        }

        .sidebar .nav-link.active, .sidebar .nav-link:hover {
            background-color: #ffffff;
            color: #000000;
        }

        .profile-info img {
            width: 32px;
            height: 32px;
            object-fit: cover;
            border-radius: 50%;
        }
        hr {
            height: 4px;
            background-color: #ffffff;
            margin: 10px 0;
        }
    </style>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <main class="d-flex flex-nowrap">
        <div class="sidebar d-flex flex-column flex-shrink-0 p-3">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <span class="fs-4">Digital Stock</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <!-- Menambahkan class active jika route cocok -->
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.index') }}" class="nav-link {{ request()->routeIs('admin.index') ? 'active' : '' }}">
                        Admin
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link">
                        Orders
                    </a>
                </li>
                <li>
                    <a href="{{ route('produk.index') }}" class="nav-link {{ request()->routeIs('produk.index') ? 'active' : '' }}">
                        Products
                    </a>
                </li>
                <li>
                    <a href="{{ route('barang.index') }}" class="nav-link {{ request()->routeIs('barang.index') ? 'active' : '' }}">
                        Barang Masuk
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link">
                        Customers
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link">
                        Laporan
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle profile-info"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <!-- Tampilkan avatar admin yang login -->
                    <img src="{{ asset('assets/img/swag.jpeg') }}" alt="" width="32" height="32"
                        class="rounded-circle me-2">
                    <strong>{{ Auth::guard('admin')->user()->nama ?? 'Admin' }}</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <main class="p-4 container">
            @yield('content')
        </main>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    @if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 2000
        });
    </script>
    @endif

    @if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session('error') }}',
        });
    </script>
    @endif

</body>
</html>
