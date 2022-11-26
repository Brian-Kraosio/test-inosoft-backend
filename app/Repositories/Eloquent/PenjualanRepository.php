<?php

namespace App\Repositories\Eloquent;

use App\Models\Kendaraan;
use App\Models\Penjualan;
use App\Repositories\PenjualanRepositoryI;

class PenjualanRepository implements PenjualanRepositoryI
{

    public function getAllData() : Object
    {
        return Penjualan::all();
    }

    public function getDataById($id) : Object
    {

        return Penjualan::findOrFail($id);
    }

    public function deleteAll()
    {
        // TODO: Implement deleteAll() method.
    }

    public function deleteById($id)
    {
        // TODO: Implement deleteById() method.
    }

    public function create(array $data) : Penjualan
    {
        return Penjualan::create($data);
    }

    public function getLogByIdKendaraan($id) : Object
    {

        return Penjualan::where('order_kendaraan.kendaraan_id', $id)->get();
    }
}
