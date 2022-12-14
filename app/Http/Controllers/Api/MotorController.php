<?php

namespace App\Http\Controllers\Api;

use App\Classes\BaseResponse\BaseResponse;
use App\Http\Controllers\Api\Controller;
use App\Services\Eloquent\MotorServices;
use Illuminate\Http\Request;

class MotorController extends Controller
{
    private $motorServices;

    /**
     * @param $motorServices
     */
    public function __construct()
    {
        $this->motorServices = new MotorServices();
    }


    public function index()
    {
        return BaseResponse::make($this->motorServices->getAllMotor());
    }

    public function store(Request $request){
        try{
            $data = [
                'tahun_keluaran' => $request->input('tahun_keluaran'),
                'warna' => $request->input('warna'),
                'harga' => $request->input('harga'),
                'class' => 'Motor',
                'stok' => $request->input('stok'),
                'detail' => [
                    'mesin' => $request->input('mesin'),
                    'tipe_suspensi' => $request->input('tipe_suspensi'),
                    'tipe_transmisi' => $request->input('tipe_transmisi'),
                ],
            ];
            $add_motor = $this->motorServices->createMotorData($data);
            BaseResponse::setStatus(201);
        }
        catch (\Exception $E){
            BaseResponse::setStatus(400);
            return BaseResponse::makeError($E->getMessage());
        }

        return BaseResponse::make($add_motor);

    }

}
