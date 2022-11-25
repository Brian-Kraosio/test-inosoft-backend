<?php

namespace App\Repositories;

interface PenjualanRepositoryI
{
    public function getAllData();
    public function getDataById($id);
    public function deleteAll();
    public function deleteById($id);
    public function create(array $data);
    public function getLogByIdKendaraan($id);
}
