<?php

declare(strict_types=1);

namespace App\Enums;

use App\Helpers\EnumHelper;

enum Role: string
{
    use EnumHelper;

    case ADMIN = UserType::ADMIN->value;
    case USER = UserType::USER->value;
}
