<?php declare(strict_types=1);

namespace App\Services\Eloquent;

use App\Classes\BaseResponse\BaseResponse;
use App\Models\Kendaraan;
use App\Repositories\Eloquent\KendaraanRepository;
use App\Services\MotorServicesI;
use GuzzleHttp\Exception\InvalidArgumentException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MotorServices extends KendaraanRepository implements MotorServicesI
{

    public function getAllMotor() : Object
    {
        return Kendaraan::where("class", "Motor")->get();
    }

    public function createMotorData(array $data) : Kendaraan
    {
        $validator = Validator::make($data, [
            'tahun_keluaran' => 'required|integer',
            'warna' => 'required|string',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'class' => '',
            'detail.mesin' => 'required',
            'detail.tipe_suspensi' => 'required',
            'detail.tipe_transmisi' => 'required',
        ]);

        if ($validator->fails()){
            throw new InvalidArgumentException($validator->errors()->first());
        }

        return $this->create($data);
    }

    public function updateMotorData()
    {
        // TODO: Implement updateMotorData() method.
    }
}
