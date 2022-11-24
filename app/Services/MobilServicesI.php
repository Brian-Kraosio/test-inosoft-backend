<?php

namespace App\Services;

interface MobilServicesI
{
    public function getAllMobil($class);
    public function createMobilData(array $data);
    public function updateMobilData($id);
}
