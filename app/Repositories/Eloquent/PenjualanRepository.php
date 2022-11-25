<?php

namespace App\Repositories\Eloquent;

use App\Models\Kendaraan;
use App\Models\Penjualan;
use App\Repositories\PenjualanRepositoryI;

class PenjualanRepository implements PenjualanRepositoryI
{

    public function getAllData()
    {
        return Penjualan::all();
    }

    public function getDataById($id)
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

    public function create(array $data)
    {
        $kendaraan = Kendaraan::find($data["order_kendaraan"]["kendaraan_id"]);

        $kendaraan->update(['stok' => $kendaraan->stok - $data["order_kendaraan"]["quantity"]]);

        return Penjualan::create($data);
    }

    public function getLogByIdKendaraan($id)
    {
        return Penjualan::where('order_kendaraan.kendaraan_id', $id)->get();
    }
}