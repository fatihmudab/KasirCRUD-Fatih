@extends('layout.home')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Produk</h6>
    </div>
    <div class="card-body">
        <a href="{{ route('produk.tambah') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Produk</a>
        <div class="table-responsive">
            @if(Auth::user()->role == 'administrator')
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $index => $product)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                            <img src="{{ asset('storage/gambar_produk/' . $product->gambar) }}" alt="{{ $product->gambar }}" style="max-width: 100px;">
                            <!-- Menampilkan gambar -->
                            </td>
                            <td>{{ $product->namaProduk }}</td>
                            <td>Rp {{ number_format($product->harga, 2, ',', '.') }}</td>
                            <td>{{ $product->stok }}</td>
                            <td>
                                <a href="{{ route('produk.edit', $product->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                <a href="{{ route('produk.hapus', $product->id) }}" class="btn btn-danger "><i class="fas fa-trash-alt"></i> Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $index => $product)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                            <img src="{{ asset('storage/gambar_produk/' . $product->gambar) }}" alt="{{ $product->gambar }}" style="max-width: 100px;">
                            <!-- Menampilkan gambar -->
                            </td>
                            <td>{{ $product->namaProduk }}</td>
                            <td>Rp {{ number_format($product->harga, 2, ',', '.') }}</td>
                            <td>{{ $product->stok }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>

@endsection
