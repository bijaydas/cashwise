<?php

declare(strict_types=1);

namespace App\Enums;

use App\Helpers\EnumHelper;

enum TransactionType: string
{
    use EnumHelper;

    case DEBIT = 'debit';
    case CREDIT = 'credit';
}
