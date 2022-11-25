<?php

namespace Tests\Feature;

use App\Models\Kendaraan;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PenjualanTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_jual_kendaraan()
    {
        $kendaraan = Kendaraan::factory()->create();
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post("/api/kendaraan/{$kendaraan['_id']}/jual",[
            'nama_pembeli' => 'Pembeli 1',
            'quantity' => 1
        ]);

        $response->assertStatus(201);
        $response->assertJsonStructure([
            'code',
            'success',
            'data' => [
                'nama_pembeli',
                'order_date',
                'order_kendaraan' => [
                    'kendaraan_id',
                    'quantity',
                ],
                'updated_at',
                'created_at',
                '_id',
            ]
        ]);
    }

    public function test_log_penjualan_all(){
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get("/api/log-jual");

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'code',
            'success',
            'data' => [
                '*' => [
                    'nama_pembeli',
                    'order_date',
                    'order_kendaraan' => [
                        'kendaraan_id',
                        'quantity',
                    ],
                    'updated_at',
                    'created_at',
                    '_id',
                ]
            ]
        ]);
    }

    public function test_log_penjualan_by_id_kendaraan(){
        $user = User::factory()->create();
        $kendaraan = Kendaraan::factory()->create();

        $response = $this->actingAs($user)->get("/api/kendaraan/{$kendaraan['_id']}/log-jual");

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'code',
            'success',
            'data' => [
                '*' => [
                    'nama_pembeli',
                    'order_date',
                    'order_kendaraan' => [
                        'kendaraan_id',
                        'quantity',
                    ],
                    'updated_at',
                    'created_at',
                    '_id',
                ]
            ]
        ]);
    }
}
