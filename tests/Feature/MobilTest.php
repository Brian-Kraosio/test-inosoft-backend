<?php

namespace Tests\Feature;

use App\Models\Kendaraan;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MobilTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */


    public function test_get_mobil_data()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get("/api/kendaraan/mobil");

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    '_id',
                    'tahun_keluaran',
                    'warna',
                    'harga',
                    'class',
                    'detail' => [
                        'mesin',
                        'kapasitas_penumpang',
                        'tipe'
                    ],
                    'stok',
                    'updated_at',
                    'created_at',
                ]
            ]
        ]);
    }

    public function test_store_mobil_data(){
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post("api/kendaraan/mobil",[
            'tahun_keluaran' => 2020,
            'warna' => "Hitam",
            'harga' => 25000000,
            'mesin' => "1500cc",
            'kapasitas_penumpang' => 5,
            'tipe' => "Test",
            'stok' => 20,
        ]);

        $response->assertStatus(201);
    }
}
