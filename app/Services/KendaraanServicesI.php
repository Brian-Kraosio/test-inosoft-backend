<?php

namespace App\Services;

interface KendaraanServicesI
{
    public function penjualanKendaraan($id);
    public function logPenjualanKendaraanById($id);
    public function getStockById($id);
}
