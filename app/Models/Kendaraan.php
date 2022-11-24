<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Kendaraan extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'kendaraan';

    protected $fillable = [
        'tahun_keluaran', 'warna', 'harga', 'tipe', 'mesin', 'tipe_suspensi', 'tipe_transmisi', 'kapasitas_penumpang', 'detail'
    ];
}
