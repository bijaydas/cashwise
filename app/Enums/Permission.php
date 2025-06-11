<?php

declare(strict_types=1);

namespace App\Enums;

use App\Helpers\EnumHelper;

enum Permission: string
{
    use EnumHelper;

    case CREATE_ACCOUNT = 'create_account';
    case UPDATE_ACCOUNT = 'update_account';
    case DELETE_ACCOUNT = 'delete_account';

    case CREATE_TRANSACTION = 'create_transaction';
    case READ_TRANSACTION = 'read_transaction';
    case UPDATE_TRANSACTION = 'update_transaction';
    case DELETE_TRANSACTION = 'delete_transaction';
}
