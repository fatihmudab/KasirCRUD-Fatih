<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggans';
    protected $fillable = 
    [
        'nama',
        'alamat',
        'no_telpon'
    ];

    public function penjualan()
    {
        return $this->hasOne(Penjualan::class);
    }
}
