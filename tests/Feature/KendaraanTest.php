<?php

namespace Tests\Feature;

use App\Models\Kendaraan;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class KendaraanTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_all_kendaraan()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get("/api/kendaraan");

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'code',
            'success',
            'data' => [
                '*' => [
                    '_id',
                    'tahun_keluaran',
                    'warna',
                    'harga',
                    'class',
                    'detail',
                    'stok',
                    'updated_at',
                    'created_at',
                ]
            ]
        ]);
    }

    public function test_get_stok_kendaraan_by_id()
    {
        $user = User::factory()->create();
        $kendaraan = Kendaraan::factory()->create();

        $response = $this->actingAs($user)->get("/api/kendaraan/{$kendaraan['_id']}/stok");


        $response->assertStatus(200);
        $response->assertJsonStructure([
            'code',
            'success',
            'data' => [
                'stok'
            ]
        ]);
    }

    public function test_get_stok_kendaraan_by_wrong_id()
    {
        $user = User::factory()->create();
        $kendaraan = Kendaraan::factory()->create();

        $response = $this->actingAs($user)->get("/api/kendaraan/{$kendaraan['_id']}random/stok");


        $response->assertStatus(404);
        $response->assertJsonStructure([
            'code',
            'success',
            'message'
        ]);
    }
}
