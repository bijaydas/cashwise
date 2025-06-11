<?php

declare(strict_types=1);

namespace App\Enums;

use App\Helpers\EnumHelper;

enum UserRole: string
{
    use EnumHelper;

    case ADMIN = 'admin';
    case USER = 'user';
}
