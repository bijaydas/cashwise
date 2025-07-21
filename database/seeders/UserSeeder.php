<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Services\User as UserService;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    private function createDemoUser(): void
    {
        app(UserService::class)
            ->create([
                'email' => 'me@bijaydas.com',
                'password' => 'password',
                'role' => 'admin',
            ])
            ->assignRole('admin');
    }

    public function run(): void
    {
        $this->createDemoUser();
    }
}
