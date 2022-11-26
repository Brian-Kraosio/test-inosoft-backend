<?php

namespace App\Services\Eloquent;

use App\Classes\BaseResponse\BaseResponse;
use App\Http\Resources\PenjualanResource;
use App\Models\Kendaraan;
use App\Models\Penjualan;
use App\Repositories\Eloquent\PenjualanRepository;
use App\Services\PenjualanServicesI;
use GuzzleHttp\Exception\InvalidArgumentException;
use Illuminate\Support\Facades\Validator;

class PenjualanServices extends PenjualanRepository implements PenjualanServicesI
{

    public function penjualanKendaraan(array $data) : Penjualan
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

        $kendaraan = Kendaraan::findorfail($data["order_kendaraan"]["kendaraan_id"]);

        abort_if($kendaraan->stok - $data["order_kendaraan"]["quantity"] <= 0, 404, 'Stok Tidak Mencukupi');

        $kendaraan->update(['stok' => $kendaraan->stok - $data["order_kendaraan"]["quantity"]]);

        return $this->create($data);
    }

    public function logPenjualanKendaraanById($id) : array
    {
        $data = $this->getLogByIdKendaraan($id);

        $quantity = $data->map(function ($val){
            return (int) $val->order_kendaraan["quantity"];
        });

        $kendaraan = Kendaraan::find($id);

        $resp = PenjualanResource::collection($data);

        $value = [
            "penjualan" => $resp,
            "total_kendaraan_terjual" => $quantity->sum(),
            "kendaraan" => $kendaraan
        ];

        return $value;
    }
}
