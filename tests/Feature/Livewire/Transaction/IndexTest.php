<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\actingAs;

uses(RefreshDatabase::class);

it('index page is visible', function () {
    $this->seed();

    actingAs(User::first());

    $this->get(route('transaction.index'))
        ->assertOk();
});
