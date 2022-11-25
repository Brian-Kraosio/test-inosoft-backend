<?php

namespace App\Http\Controllers\Api;

use App\Classes\BaseResponse\BaseResponse;
use App\Http\Controllers\Api\Controller;
use App\Services\Eloquent\MobilServices;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    private $mobilServices;

    /**
     * @param $mobilServices
     */
    public function __construct()
    {
        $this->mobilServices = new MobilServices();
    }

    public function index()
    {
        return BaseResponse::make($this->mobilServices->getAllMobil());
    }

    public function store(Request $request){
        try{
            $data = [
                'tahun_keluaran' => $request->input('tahun_keluaran'),
                'warna' => $request->input('warna'),
                'harga' => $request->input('harga'),
                'class' => 'Mobil',
                'stok' => $request->input('stok'),
                'detail' => [
                    'mesin' => $request->input('mesin'),
                    'kapasitas_penumpang' => $request->input('kapasitas_penumpang'),
                    'tipe' => $request->input('tipe'),
                ],
            ];

            $add_mobil = $this->mobilServices->createMobilData($data);

            BaseResponse::setStatus(201);
        }
        catch (\Exception $E){
            BaseResponse::setStatus(400);
            return BaseResponse::makeError($E->getMessage());
        }

        return BaseResponse::make($add_mobil);

    }

}
