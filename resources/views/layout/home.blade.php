<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Kasir Fatih</title>
    <style>
        .main {
            height: 100vh;
        }

        .sidebar {
            background-color: #1f242d;
            height: 100vh; /* Full height */
        }

        .sidebar-link {
            text-decoration: none;
            padding: 15px 20px;
            color: #E8ECF1;
            display: flex;
            align-items: center;
            transition: background-color 0.3s ease;
        }

        .sidebar-link:hover {
            background-color: #343a40; /* Darker background on hover */
        }

        .sidebar-link.active {
            background-color: #343a40; /* Active link background */
            border-right: solid 4px #ffffff; /* Highlight active link */
        }

        .sidebar-link i {
            margin-right: 10px; /* Space between icon and text */
        }

        .content {
            background-color: #f8f9fa; /* Light background for content area */
        }
    </style>
</head>
<body>

    <div class="main d-flex flex-column justify-content-between">
        <div class="body-main h-100">
            <div class="row g-0 h-100">
                <div class="sidebar col-lg-2 p-4 collapse d-lg-block" id="navbarSupportedContent">
                    <h4 class="text-light mb-4"><i class="bi bi-subtract p-2"></i> Aplikasi Kasir</h4>
                    @if(Auth::user()->role == 'administrator')
                        <a href="/dashboard" class="sidebar-link @if(request()->route()->uri == 'dashboard') active @endif">
                            <i class="bi bi-house-door-fill"></i> Dashboard
                        </a>
                        <a href="/produk" class="sidebar-link @if(request()->route()->uri == 'produk') active @endif">
                            <i class="bi bi-box-fill"></i> Produk
                        </a>
                        <a href="/penjualan" class="sidebar-link @if(request()->route()->uri == 'penjualan') active @endif">
                            <i class="bi bi-cart4"></i> Penjualan
                        </a>
                        <a href="/user" class="sidebar-link @if(request()->route()->uri == 'user') active @endif">
                            <i class="bi bi-person-fill"></i> User
                        </a>
                        <a href="/logout" class="sidebar-link">
                            <i class="bi bi-box-arrow-left" style="color:#FFFFFF;"></i> Logout
                        </a>
                    @else
                        <a href="/dashboard" class="sidebar-link @if(request()->route()->uri == 'dashboard') active @endif">
                            <i class="bi bi-house-door-fill"></i> Dashboard
                        </a>
                        <a href="/penjualan" class="sidebar-link @if(request()->route()->uri == 'penjualan') active @endif">
                            <i class="bi bi-cart4"></i> Penjualan
                        </a>
                        <a href="/produk" class="sidebar-link @if(request()->route()->uri == 'produk') active @endif">
                            <i class="bi bi-box-fill"></i> Produk
                        </a>
                        <a href="/logout" class="sidebar-link">
                            <i class="bi bi-box-arrow-left" style="color:#FFFFFF;"></i> Logout
                        </a>
                    @endif
                </div>
                <div class="content col-lg-9 p-5">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
</body>
</html>
