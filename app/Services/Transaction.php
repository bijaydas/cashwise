<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User as UserModel;
use Illuminate\Pagination\LengthAwarePaginator;

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

    public function search(UserModel $user, ?string $search = null): LengthAwarePaginator
    {
        $query = $user->transactions();

        $queryParser = new SearchQueryParser($search);

        $category = $queryParser->getCategory();
        $type = $queryParser->getType();
        $method = $queryParser->getMethod();
        $date = $queryParser->getDate();
        $amount = $queryParser->getAmount();
        $orderBy = $queryParser->getOrderBy();

        $query->when($category, fn ($query, $category) => $query->whereIn('category', $category));

        $query->when($type, fn ($query, $type) => $query->whereIn('type', $type));

        $query->when($method, fn ($query, $method) => $query->whereIn('method', $method));

        $query->when($date, function ($query, $date) {
            if (is_string($date)) {
                $query->whereDate('date', $date);
            }

            if (is_array($date)) {
                $query->whereBetween('date', $date);
            }
        });

        $query->when($amount, function ($query, $amount) {
            if (is_string($amount)) {
                $query->where('amount', $amount);
            }
            if (is_array($amount)) {
                $query->whereBetween('amount', $amount);
            }
        });

        if (! $category && ! $type && ! $method && ! $date && ! $amount) {
            $query->when($search, function ($query, $search) {
                $query->where('summary', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('date', 'like', "%{$search}%")
                    ->orWhere('amount', 'like', "%{$search}%")
                    ->orWhere('category', 'like', "%{$search}%")
                    ->orWhere('type', 'like', "%{$search}%")
                    ->orWhere('method', 'like', "%{$search}%");
            });
        }

        $query->when($orderBy, function ($query, $orderBy) {
            $query->orderBy($orderBy);
        });

        return $query->paginate(config('database.pagination.transactions'));
    }
}
