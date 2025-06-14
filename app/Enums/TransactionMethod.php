<?php

declare(strict_types=1);

namespace App\Enums;

use App\Helpers\EnumHelper;

enum TransactionMethod: string
{
    use EnumHelper;

    case CASH = 'cash';
    case UPI = 'upi';
    case CREDIT_CARD = 'credit_card';
    case DEBIT_CARD = 'debit_card';
}
