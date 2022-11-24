<?php

namespace App\Services\Eloquent;

use App\Repositories\Eloquent\KendaraanRepository;
use App\Services\KendaraanServicesI;

class KendaraanServices extends KendaraanRepository implements KendaraanServicesI
{

    public function penjualanKendaraan($id)
    {
        // TODO: Implement penjualanKendaraan() method.
    }

    public function logPenjualanKendaraanById($id)
    {
        // TODO: Implement logPenjualanKendaraanById() method.
    }

    public function getStockById($id)
    {

        $data = $this->getDataById($id);

        return $data['stok'];

    }
}
