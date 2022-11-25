<?php

declare(strict_types=1);

namespace App\Repositories\Eloquent;

use App\Models\Kendaraan;
use App\Repositories\KendaraanRepositoryI;

class KendaraanRepository implements KendaraanRepositoryI
{

    public function getAllData()
    {
        return Kendaraan::all();
    }

    public function getDataById($id)
    {
        return Kendaraan::findOrFail($id);
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

        return Kendaraan::create($data);

    }
}

