<?php

namespace App\Services\Eloquent;

use App\Repositories\Eloquent\KendaraanRepository;
use App\Services\KendaraanServicesI;

class KendaraanServices extends KendaraanRepository implements KendaraanServicesI
{


    public function getStockById($id) : array
    {

        $stok = $this->getDataById($id);

        return ["stok" => $stok['stok']];

    }
}
