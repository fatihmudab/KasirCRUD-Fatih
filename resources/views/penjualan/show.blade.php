@extends('layout.home')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-shopping-cart"></i> Penjualan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Penjualan</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow">
                        <div class="card-header bg-dark text-white">
                            <h3 class="card-title"><i class="fas fa-table"></i> Daftar Penjualan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th style="width: 10%" class="text-center">No</th>
                                            <th style="width: 30%" class="text-center">Nama Produk</th>
                                            <th style="width: 20%" class="text-center">Jumlah Produk</th>
                                            <th style="width: 30%" class="text-center">SubTotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($penjualan as $item)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $item->produk->namaProduk }}</td>
                                                <td class="text-center">{{ $item->quantity }}</td>
                                                <td class="text-right">Rp.{{ number_format($item->sub_total, 0, ',', '.') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="" class="btn btn-success btn-sm" target="_blank">
                                <i class="{{route('cetak-pdf')}}"></i> Cetak PDF
                            </a>
                            <a href="{{ route('penjualan') }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
