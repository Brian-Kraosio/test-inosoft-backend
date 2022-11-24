<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Repositories\Eloquent\KendaraanRepository;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    private $kendaraanRepo;


    public function __construct()
    {
        $this->kendaraanRepo = new KendaraanRepository();
    }


    public function index()
    {
        return $this->kendaraanRepo->getAllData();
    }

}
