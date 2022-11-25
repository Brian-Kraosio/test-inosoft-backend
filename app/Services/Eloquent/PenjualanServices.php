<?php

namespace App\Services\Eloquent;

use App\Repositories\Eloquent\PenjualanRepository;
use App\Services\PenjualanServicesI;
use GuzzleHttp\Exception\InvalidArgumentException;
use Illuminate\Support\Facades\Validator;

class PenjualanServices extends PenjualanRepository implements PenjualanServicesI
{

    public function penjualanKendaraan(array $data)
    {
        $validator = Validator::make($data, [
            'nama_pembeli' => 'required|string',
            'order_date' => 'required|date',
            'order_kendaraan.kendaraan_id' => 'required',
            'order_kendaraan.quantity' => 'required|integer',
        ]);

        if ($validator->fails()){
            throw new InvalidArgumentException($validator->errors()->first());
        }

        return $this->create($data);
    }

    public function logPenjualanKendaraanById($id)
    {
        return $this->getLogByIdKendaraan($id);
    }
}
