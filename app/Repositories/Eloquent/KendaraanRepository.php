<?php

namespace App\Repositories\Eloquent;

use App\Classes\BaseResponse\BaseResponse;
use App\Models\Kendaraan;
use App\Repositories\KendaraanRepositoryI;

class KendaraanRepository implements KendaraanRepositoryI
{

    public function getAllData()
    {
        $data = Kendaraan::all();

        return BaseResponse::make($data);
    }

    public function getById($id)
    {
        // TODO: Implement getById() method.
    }

    public function deleteAll()
    {
        // TODO: Implement deleteAll() method.
    }

    public function deleteById($id)
    {
        // TODO: Implement deleteById() method.
    }
}

