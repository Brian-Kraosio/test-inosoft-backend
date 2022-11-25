<?php

namespace Database\Factories;

use App\Models\Kendaraan;
use Illuminate\Database\Eloquent\Factories\Factory;

class KendaraanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Kendaraan::class;

    public function definition()
    {
        return [
                'tahun_keluaran' => $this->faker->numberBetween(2000, 2022),
                'warna' => $this->faker->safeColorName(),
                'harga' => $this->faker->randomDigitNotNull(),
                'class' => 'Mobil',
                'stok' => $this->faker->numberBetween(5, 50),
                'detail' => [
                    'mesin' => $this->faker->word(),
                    'kapasitas_penumpang' => $this->faker->numberBetween(1, 4),
                    'tipe' => $this->faker->word(),
                ],
        ];
    }
}
