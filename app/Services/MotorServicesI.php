<?php

namespace App\Services;

interface MotorServicesI
{
    public function getAllMotor();
    public function createMotorData(array $data);
    public function updateMotorData();
}
