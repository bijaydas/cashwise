<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User as UserModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

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
                'account_status' => $data['account_status'] ?? 'active',
                'date_of_birth' => empty($data['date_of_birth']) ? null : $data['date_of_birth'],
                'date_of_anniversary' => empty($data['date_of_anniversary']) ? null : $data['date_of_anniversary'],
                'primary_phone' => $data['primary_phone'] ?? null,
                'secondary_phone' => $data['secondary_phone'] ?? null,
                'gender' => $data['gender'] ?? null,
            ]);

            // Assign the user to the default role.
            $user->assignRole($data['role'] ?? 'user');

            return $user;
        });
    }

    public function update(string $userId, array $data)
    {
        $user = UserModel::findOrFail($userId);

        return DB::transaction(function () use ($data, $user) {
            $user->update([
                'name' => $data['name'],
                'nickname' => $data['nickname'],
                'email' => $data['email'],
                'password' => $data['password'] ? Hash::make($data['password']) : $user->password,
                'date_of_birth' => empty($data['date_of_birth']) ? null : $data['date_of_birth'],
                'date_of_anniversary' => empty($data['date_of_anniversary']) ? null : $data['date_of_anniversary'],
                'primary_phone' => $data['primary_phone'] ?? null,
                'secondary_phone' => $data['secondary_phone'] ?? null,
                'gender' => $data['gender'],
            ]);

            $user->syncRoles($data['role']);
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

    public function findById(string $id): UserModel
    {
        return UserModel::findOrFail($id);
    }
}
