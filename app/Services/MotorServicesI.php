<?php

namespace App\Services;

interface MotorServicesI
{
    public function getAllMotor($class);
    public function createMotorData(array $data);
    public function updateMotorData();
}
