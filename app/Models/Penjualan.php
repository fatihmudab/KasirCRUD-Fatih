<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualans';
    protected $fillable = 
    [
        'tanggal_penjualan',
        'total_harga',
        'pelanggan_id'
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function detailPenjualan()
    {
        return $this->hasOne(DetailPenjualan::class);
    }
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
