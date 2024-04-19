<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\DetailPenjualan;
use App\Models\Pelanggan;
use App\Models\penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function index()
    {
        return view('layout.dashboard');
    }
}
