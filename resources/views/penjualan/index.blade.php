@extends('layout.home')

@section('content')

<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Penjualan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if(Auth::user()->role == 'administrator')
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pelanggan</th>
                            <th>Total Harga</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penjualans as $key => $penjualan)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $penjualan->pelanggan->nama }}</td>
                                <td>Rp {{ number_format($penjualan->total_harga, 2, ',', '.') }}</td>
                                <td>{{ $penjualan->tanggal_penjualan }}</td>
                                <td>
                                    <button type="button" onclick="window.location='{{ route('penjualan.detail', $penjualan->id) }}'" class="btn btn-info"><i class="fas fa-info-circle"></i> Detail</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <a href="{{ route('penjualan.tambah') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Penjualan</a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pelanggan</th>
                            <th>Total Harga</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penjualans as $key => $penjualan)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $penjualan->pelanggan->nama }}</td>
                                <td>Rp {{ number_format($penjualan->total_harga, 2, ',', '.') }}</td>
                                <td>{{ $penjualan->tanggal_penjualan }}</td>
                                <td>
                                    <button type="button" onclick="window.location='{{ route('penjualan.detail', $penjualan->id) }}'" class="btn btn-info"><i class="fas fa-info-circle"></i> Detail</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>

@endsection