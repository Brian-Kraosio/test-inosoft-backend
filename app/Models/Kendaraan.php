<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Kendaraan extends Eloquent
{
    Use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'kendaraans';

    protected $fillable = [
        'tahun_keluaran', 'warna', 'harga', 'tipe', 'mesin', 'tipe_suspensi', 'tipe_transmisi', 'kapasitas_penumpang', 'detail', 'stok'
    ];


    public function penjualan(){
        return $this->belongsToMany(Penjualan::class, null, 'penjualan_id', 'kendaraan_id');
    }
}
