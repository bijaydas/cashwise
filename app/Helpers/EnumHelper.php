<?php

declare(strict_types=1);

namespace App\Helpers;

trait EnumHelper
{
    public static function getValues(): array
    {
        return self::cases();
    }

    public static function getValuesForSelect(): array
    {
        return collect(self::getValues())->map(function ($value) {
            return $value->value;
        })->toArray();
    }

    public static function dbInsert(): array
    {
        return collect(self::getValues())->map(function ($value) {
            return [
                'name' => $value,
                'guard_name' => 'web',
                'created_at' => now(),
            ];
        })
            ->toArray();
    }
}
