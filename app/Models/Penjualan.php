<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Penjualan extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'penjualan';

    protected $fillable = [
        'nama_pembeli', 'order_kendaraan', 'kendaraan_id', 'quantity', 'order_date'
    ];

    public function kendaraan(){
        return $this->belongsToMany(Kendaraan::class, null, 'kendaraan_id', 'penjualan_id');
    }
}
