<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Penjualan extends Eloquent
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'penjualans';

    protected $fillable = [
        'nama_pembeli', 'order_kendaraan', 'kendaraan_id', 'quantity', 'order_date'
    ];

    public function kendaraan(){
        return $this->belongsToMany(Kendaraan::class, null, 'kendaraan_id', 'penjualan_id');
    }
}
