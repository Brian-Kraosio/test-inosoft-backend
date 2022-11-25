<?php

namespace App\Http\Controllers\Api;

use App\Classes\BaseResponse\BaseResponse;
use App\Http\Controllers\Api\Controller;
use App\Services\Eloquent\KendaraanServices;

class KendaraanController extends Controller
{
    private $kendaraanService;

    public function __construct()
    {
        $this->kendaraanService = new KendaraanServices();
    }


    public function index()
    {
        $data = $this->kendaraanService->getAllData();

        return BaseResponse::make($data);
    }

    public function getStockById($id){
        try{
            $stok = $this->kendaraanService->getStockById($id);
        }
        catch (\Exception $E){
            BaseResponse::setStatus(404);
            return BaseResponse::makeError("Not Found");
        }

        return BaseResponse::make($stok);
    }

}
