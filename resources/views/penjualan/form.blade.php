@extends('layout.home')

@section('content')

<form action="{{ isset($penjualan) ? route('penjualan.edit.update', $penjualan->id) : route('penjualan.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        {{ isset($penjualan) ? 'Form Edit Penjualan' : 'Form Tambah Penjualan' }}
                    </h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama Pelanggan</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ isset($penjualan) ? $penjualan->nama : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ isset($penjualan) ? $penjualan->alamat : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="no_telpon">Nomor Telepon</label>
                        <input type="text" class="form-control" id="no_telpon" name="no_telpon" value="{{ isset($penjualan) ? $penjualan->no_telpon : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_penjualan">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal_penjualan" name="tanggal_penjualan"
                            value="{{ isset($penjualan) ? $penjualan->created_at->format('Y-m-d') : '' }}">
                    </div>
                </div>
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        {{ isset($penjualan) ? 'Form Edit Penjualan' : 'Pilih Produk' }}
                    </h6>
                </div>
                <div class="card-body" id="penjualanForm">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="produk_id">Produk</label>
                                <select class="form-control" id="produk_id" name="produk_id[]" required>
                                    <option value="">Pilih Produk</option>
                                    @foreach($produks as $produk)
                                        <option value="{{ $produk->id }}">{{ $produk->namaProduk }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="quantity">Jumlah Beli</label>
                                <input type="number" class="form-control" id="quantity" name="quantity[]" required>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-primary" id="addpenjualanItem"><i class="fas fa-plus"></i> Tambah Item Penjualan</button>

                <script>
                    document.getElementById('addpenjualanItem').addEventListener('click', function() {
                        var penjualanForm = document.getElementById('penjualanForm');
                        var newpenjualanItem = penjualanForm.cloneNode(true);
                        penjualanForm.parentNode.insertBefore(newpenjualanItem, this);
                    });
                </script>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                    <a href="{{ route('penjualan') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
