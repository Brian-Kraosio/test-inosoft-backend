<?php

namespace Database\Seeders;

use App\Models\Kendaraan;
use Illuminate\Database\Seeder;

class MobilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mobil = [
            [
                'tahun_keluaran' => 2021,
                'warna' => "emas",
                'harga' => 5000000000,
                'class' => 'Mobil',
                'stok' => 3,
                'detail' => [
                    'mesin' => "8000cc",
                    'kapasitas_penumpang' => 2,
                    'tipe' => "Supercar",
                ],
            ],
        ];

        foreach ($mobil as $mbl){
            Kendaraan::create($mbl);
        }
    }
}
