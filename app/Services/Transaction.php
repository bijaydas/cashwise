<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User as UserModel;

class Transaction
{
    public function create(UserModel $user, array $data)
    {
        return $user->transactions()->create([
            'date' => $data['date'],
            'amount' => $data['amount'],
            'type' => $data['type'],
            'method' => $data['method'],
            'category' => $data['category'],
            'summary' => $data['summary'],
            'description' => $data['description'],
        ]);
    }
}
