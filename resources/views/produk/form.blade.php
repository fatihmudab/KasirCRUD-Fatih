@extends('layout.home')

<form action="{{ isset($product) ? route('produk.edit.update', $product->id) : route('produk.tambah.simpan') }}"
    method="post" enctype="multipart/form-data">
    @csrf
    @section('content')
        @if (Session::get('success-pj'))
            <div class="alert alert-primary">{{ Session::get('success-pj') }}</div>
        @endif
        @if (Session::get('edit-pj'))
            <div class="alert alert-primary">{{ Session::get('edit-pj') }}</div>
        @endif
        @if (Session::get('add-pj'))
            <div class="alert alert-primary">{{ Session::get('add-pj') }}</div>
        @endif
        @if (Session::get('status'))
            <div class="alert alert-primary">{{ Session::get('status') }}</div>
        @endif
        @if (Session::get('delete-pj'))
            <div class="alert alert-primary">{{ Session::get('delete-pj') }}</div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            {{ isset($product) ? 'Form Edit Produk' : 'Form Tambah Produk' }}
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="namaProduk">Nama Produk</label>
                            <input type="text" class="form-control" id="namaProduk" name="namaProduk"
                                value="{{ isset($product) ? $product->namaProduk : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga"
                                value="{{ isset($product) ? $product->harga : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="text" class="form-control" id="stok" name="stok"
                                value="{{ isset($product) ? $product->stok : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="gambar" class="form-label mt-3">Gambar Produk</label>
                            <input type="file" name="gambar" id="gambar" class="form-control w-50">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                        <a href="{{ route('produk') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i>
                            Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
