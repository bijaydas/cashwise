<?php

declare(strict_types=1);

namespace App\Enums;

use App\Helpers\EnumHelper;

enum TransactionCategory: string
{
    use EnumHelper;

    case FOOD = 'food';
    case PETROL = 'petrol';
    case RENT = 'rent';
    case MAINTENANCE = 'maintenance';
    case GROCERY = 'grocery';
    case SALARY = 'salary';
    case MISC = 'misc';
}
