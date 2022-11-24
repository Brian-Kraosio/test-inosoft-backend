<?php

namespace App\Services\Eloquent;

use App\Classes\BaseResponse\BaseResponse;
use App\Models\Kendaraan;
use App\Repositories\Eloquent\KendaraanRepository;
use App\Services\MotorServicesI;
use Illuminate\Http\Request;

class MotorServices implements MotorServicesI
{

    public function getAllMotor($class)
    {
        // TODO: Implement getAllMotor() method.
    }

    public function createMotorData(array $data)
    {
        $add_motor = Kendaraan::create($data);
        return $add_motor;
    }

    public function updateMotorData()
    {
        // TODO: Implement updateMotorData() method.
    }
}
