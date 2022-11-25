<?php

namespace Database\Factories;

use App\Models\Kendaraan;
use Illuminate\Database\Eloquent\Factories\Factory;

class PenjualanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_pembeli' => $this->faker->name(),
            'order_date' => now(),
            'order_kendaraan' => [
                'kendaraan_id' => Kendaraan::all()->random()->id,
                'quantity' => $this->faker->numberBetween(1, 5),
            ],
        ];
    }
}
