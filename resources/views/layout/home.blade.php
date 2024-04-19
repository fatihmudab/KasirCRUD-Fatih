<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Kasir Fajar</title>
</head>
<body>

<style>
    .main {
        height: 100vh;
    }

    .sidebar {
        /* background-color: #A8CD9F; */
        background-color: #8DECB4;
    }

    .sidebar a{
        text-decoration: none;
        padding: 20px 20px;
        color:#E8ECF1;
        display: block;
    }

    .sidebar a:hover{
        background-color: #8DECB4;
    }

    .sidebar a.active{
        background-color: #8DECB4;
        border-right: solid 4px #8DECB4;
    }

    .books{
        background-color:#B5CFD8;
    }

    .card-data{
        border-radius:5px;
        padding: 20px 50px;
        border: solid 1px;
        color:#fff;
    }

    .card-data i{
        font-size: 50px;
    }

    .desc{
        font-size: 30px;
    }

    .count{
        font-size: 30px;
    }

    .category{
        background-color:#B5CFD8;
    }

    .users{
        background-color:#FD8A8A;
    }
</style>

<body>

    <div class="main d-flex flex-column justify-content-between">
        <div class="body-main h-100">
            <div class="row g-0 h-100">
                <div class="sidebar col-lg-2 p-2  collapse d-lg-block" id="navbarSupportedContent">
                    @if(Auth::user()->role == 'administrator')
                    <br><h4 href=""><i class="bi bi-subtract p-2"></i> Aplikasi Kasir</h4><br>
                        <a href="/dashboard" @if(request()->route()->uri == 'dashboard') class='active' @endif>
                        <i class="bi bi-house-door-fill p-2"></i> Dashboard</a>
                        <a href="/produk" @if(request()->route()->uri == 'produk') class='active' @endif><i class="bi bi-box-fill p-2"></i>Produk</a>
                        <a href="/penjualan" @if(request()->route()->uri == 'penjualan') class='active' @endif><i class="bi bi-cart4 p-2"></i>Penjualan</a>
                        <a href="/user" @if(request()->route()->uri == 'user') class='active' @endif><i class="bi bi-person-fill p-2"></i>User</a>
                        <a href="/logout"> <i class="bi bi-box-arrow-left p-2" style="color:#FFFFFF;"> Logout</i></a>
                    @else
                    <br><h4 href=""><i class="bi bi-subtract p-2"></i> Aplikasi Kasir</h4><br>
                    <a href="/petugas" @if(request()->route()->uri == 'petugas') class='active' @endif>
                    <i class="bi bi-house-door-fill p-2"></i> Dashboard</a>
                    <a href="/penjualan" @if(request()->route()->uri == 'penjualan') class='active' @endif><i class="bi bi-cart4 p-2"></i>Penjualan</a>
                    <a href="/produk" @if(request()->route()->uri == 'produk') class='active' @endif><i class="bi bi-box-fill p-2"></i>Produk</a>
                    <a href="/logout"> <i class="bi bi-box-arrow-left p-2" style="color:#FFFFFF;"> Logout</i></a>
                    @endif
                </div>
                <div class="content col-lg-9 p-5 ">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

</body>
    
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
</body>
</html>