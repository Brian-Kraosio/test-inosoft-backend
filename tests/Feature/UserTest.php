<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_login()
    {
        $response = $this->post('/api/login',[
            'email' => 'admin@test.id',
            'password' => 'password'
        ]);

        $response->assertStatus(200);
    }

    public function test_wrong_user_login()
    {
        $response = $this->post('/api/login',[
            'email' => 'admin@test.id',
            'password' => 'pass'
        ]);

        $response->assertStatus(401);
    }

    public function test_see_user_info()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/api/user');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'code',
            'success',
            'data' => [
                'name',
                'email',
                'email_verified_at',
                'created_at',
                'updated_at',
                '_id',
            ]
        ]);
    }

    public function test_see_user_info_without_login()
    {
        $response = $this->post('/api/user');

        $value = [
            'status' => "Authorization Token not found"
        ];

        $response->assertJson($value);
    }
}
