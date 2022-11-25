<?php

namespace App\Services;

interface MobilServicesI
{
    public function getAllMobil();
    public function createMobilData(array $data);
    public function updateMobilData($id);
}
