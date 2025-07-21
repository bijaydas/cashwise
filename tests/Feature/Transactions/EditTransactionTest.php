<?php

declare(strict_types=1);

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Transaction;
use App\Models\User;

uses(RefreshDatabase::class);

describe('Edit transaction', function () {
    it('update transaction', function () {
        $this->seed();


    });
});
