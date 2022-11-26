<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Kendaraan extends Eloquent
{
    Use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'kendaraans';

    protected $casts = [
        'harga' => 'integer',
        'stok' => 'integer'
    ];

    protected $fillable = [
        'tahun_keluaran', 'warna', 'harga', 'tipe', 'mesin', 'tipe_suspensi', 'tipe_transmisi', 'kapasitas_penumpang', 'detail', 'stok', 'class'
    ];


    public function penjualan(){
        return $this->belongsToMany(Penjualan::class);
    }
}
