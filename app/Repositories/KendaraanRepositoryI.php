<?php

namespace App\Repositories;

interface KendaraanRepositoryI
{
    public function getAllData();
    public function getById($id);
    public function deleteAll();
    public function deleteById($id);
}
