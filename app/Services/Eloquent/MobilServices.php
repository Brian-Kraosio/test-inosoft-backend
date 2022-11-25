<?php declare(strict_types=1);

namespace App\Services\Eloquent;

use App\Models\Kendaraan;
use App\Repositories\Eloquent\KendaraanRepository;
use App\Services\MobilServicesI;
use GuzzleHttp\Exception\InvalidArgumentException;
use Illuminate\Support\Facades\Validator;


class MobilServices extends KendaraanRepository implements MobilServicesI
{


    public function getAllMobil()
    {
        return Kendaraan::where("class", "Mobil")->get();
    }

    public function createMobilData(array $data)
    {
        $validator = Validator::make($data, [
            'tahun_keluaran' => 'required|integer',
            'warna' => 'required|string',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'detail.mesin' => 'required',
            'detail.kapasitas_penumpang' => 'required',
            'detail.tipe' => 'required',
        ]);

        if ($validator->fails()){
            throw new InvalidArgumentException($validator->errors()->first());
        }

        return $this->create($data);
    }

    public function updateMobilData($id)
    {
        // TODO: Implement updateMobilData() method.
    }
}
