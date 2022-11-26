<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MotorTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_motor_data()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get("/api/kendaraan/motor");

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
                        'tipe_transmisi',
                        'tipe_suspensi'
                    ],
                    'stok',
                    'updated_at',
                    'created_at',
                ]
            ]
        ]);
    }

    public function test_store_motor_data(){
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post("api/kendaraan/motor",[
            'tahun_keluaran' => 2020,
            'warna' => "Hitam",
            'harga' => 25000000,
            'mesin' => "1500cc",
            'tipe_transmisi' => "Manual",
            'tipe_suspensi' => "Telescopic fork",
            'stok' => 20,
        ]);

        $response->assertStatus(201);
    }
}
