@extends('layout.home')

@section('content')
    @if (Session::get('failed'))
        <div class="alert alert-danger">{{ Session::get('failed') }}</div>
    @endif

    @if (Session::get('canAccess'))
        <div class="alert alert-warning">{{ Session::get('canAccess') }}</div>
    @endif

    @if (Session::get('login'))
        <div class="alert alert-primary">{{ Session::get('login') }}</div>
    @endif

    @if (Session::get('failed-pg'))
        <div class="alert alert-primary">{{ Session::get('failed-pg') }}</div>
    @endif
    <div class="container my-5">
        <div class="card shadow-lg border-0">
            <div class="jumbotron py-5 px-4 text-center"
                style="background: linear-gradient(135deg, #2c3e50, #34495e); color: #ecf0f1;">

                <h1 class="display-4">Selamat Datang, {{ Auth::user()->name }}!</h1>
                <hr class="my-4">
                <p class="lead">Aplikasi ini digunakan hanya oleh pegawai administrator APOTEK.</p>
                <p>Digunakan untuk mengelola data user, penyetokan, juga pembelian (kasir).</p>
                <a href="#" class="btn btn-light btn-lg mt-4">Mulai Sekarang</a>
            </div>
        </div>
    </div>
@endsection
