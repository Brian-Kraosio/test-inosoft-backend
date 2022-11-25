<?php

namespace Database\Seeders;

use App\Models\Kendaraan;
use App\Models\Penjualan;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datetime = Carbon::now();

        $penjualan = [
            [
                'nama_pembeli' => "Brian Say",
                'order_date' => $datetime->toDateTimeString(),
                'order_kendaraan' => [
                    'kendaraan_id' => Kendaraan::where("class", "Mobil")->first()->_id,
                    'quantity' => 1,
                ],
            ],
        ];

        foreach ($penjualan as $pnj){
            Penjualan::create($pnj);
        }
    }
}
