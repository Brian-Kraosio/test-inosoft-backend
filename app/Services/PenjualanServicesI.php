<?php

namespace App\Services;

interface PenjualanServicesI
{
    public function penjualanKendaraan(array $data);
    public function logPenjualanKendaraanById($id);
}
