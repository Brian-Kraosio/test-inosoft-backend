<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            MobilSeeder::class,
            MotorSeeder::class,
            PenjualanSeeder::class
        ]);

        User::create([
            'email' => 'admin@test.id',
            'password'=> bcrypt('password'),
        ]);
    }
}
