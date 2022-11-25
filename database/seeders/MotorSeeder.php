<?php

namespace Database\Seeders;

use App\Models\Kendaraan;
use Illuminate\Database\Seeder;

class MotorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $motor = [
            [
                'tahun_keluaran' => 2021,
                'warna' => "hitam",
                'harga' => 20000000,
                'class' => 'Motor',
                'stok' => 3,
                'detail' => [
                    'mesin' => "1000cc",
                    'tipe_transmisi' => 'Manual',
                    'tipe_suspensi' => "Telescopic fork",
                ],
            ],
        ];

        foreach ($motor as $mtr){
            Kendaraan::create($mtr);
        }
    }
}
