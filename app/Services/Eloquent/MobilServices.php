<?php

namespace App\Services\Eloquent;

use App\Models\Kendaraan;
use App\Services\MobilServicesI;

class MobilServices implements MobilServicesI
{

    public function getAllMobil($class)
    {
        // TODO: Implement getAllMobil() method.
    }

    public function createMobilData(array $data)
    {
        $add_mobil = Kendaraan::create($data);
        return $add_mobil;
    }

    public function updateMobilData($id)
    {
        // TODO: Implement updateMobilData() method.
    }
}
