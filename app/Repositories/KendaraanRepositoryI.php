<?php

namespace App\Repositories;

interface KendaraanRepositoryI
{
    public function getAllData();
    public function getDataById($id);
    public function deleteAll();
    public function deleteById($id);
    public function create(array $data);
}
