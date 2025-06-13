<?php

namespace Database\Seeders;

use App\Services\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $service = new User;
        $service->create([
            'email' => 'test@test.com',
            'password' => 'secretpassword',
            'role' => 'admin',
        ]);
    }
}
