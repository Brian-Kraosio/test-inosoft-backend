<?php

namespace App\Http\Controllers\Api;

use App\Classes\BaseResponse\BaseResponse;
use App\Http\Controllers\Api\Controller;
use App\Http\Resources\PenjualanResource;
use App\Services\Eloquent\PenjualanServices;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{

    private $penjualanService;

    /**
     * @param $penjualanService
     */
    public function __construct()
    {
        $this->penjualanService = new PenjualanServices();
    }



    public function index()
    {
        $data = $this->penjualanService->getAllData();

        return BaseResponse::make($data);
    }


    public function store(Request $request, $id)
    {
        try{

            $datetime = Carbon::now();

            $data = [
                'nama_pembeli' => $request->input('nama_pembeli'),
                'order_date' => $datetime->toDateTimeString(),
                'order_kendaraan' => [
                    'kendaraan_id' => $id,
                    'quantity' => $request->input('quantity'),
                ],
            ];

            $add_kendaraan = $this->penjualanService->penjualanKendaraan($data);
            BaseResponse::setStatus(201);
        }
        catch (\Exception $E){
            BaseResponse::setStatus(400);
            return BaseResponse::makeError($E->getMessage());
        }

        return BaseResponse::make($add_kendaraan);
    }


    public function logPenjualanKendaaran($id)
    {
        try{
            $logJual = $this->penjualanService->logPenjualanKendaraanById($id);

        }
        catch (\Exception $E){
            BaseResponse::setStatus(404);
            return BaseResponse::makeError("Not Found");
        }
        return BaseResponse::make($logJual);
    }

}
