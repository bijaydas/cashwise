<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User as UserModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class User
{
    public function create(array $data)
    {
        if (! $data['email'] || ! $data['password']) {
            throw new \InvalidArgumentException('Email and password are required.');
        }

        if (filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false) {
            throw new \InvalidArgumentException('Invalid email address.');
        }

        if ($this->isEmailTaken($data['email'])) {
            throw new \InvalidArgumentException('Email is already taken.');
        }

        return DB::transaction(function () use ($data) {
            // Create the user.
            $user = UserModel::create([
                'name' => $data['name'] ?? null,
                'nickname' => $data['nickname'] ?? null,
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'status' => $data['status'] ?? 'active',
                'date_of_birth' => $data['date_of_birth'] ?? null,
                'date_of_anniversary' => $data['date_of_anniversary'] ?? null,
                'primary_phone' => $data['primary_phone'] ?? null,
                'secondary_phone' => $data['secondary_phone'] ?? null,
                'gender' => $data['gender'] ?? null,
            ]);

            // Assign the user to the default role.
            $user->assignRole($data['role'] ?? 'user');

            return $user;
        });
    }

    /**
     * Check if the email is already taken.
     */
    public function isEmailTaken(string $email): bool
    {
        return UserModel::query()
            ->where('email', $email)
            ->exists();
    }
}
