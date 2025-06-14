<?php

declare(strict_types=1);

use App\Livewire\Transaction\Create as CreateTransaction;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

use function Pest\Laravel\actingAs;

uses(RefreshDatabase::class);

it('create transaction page is visible', function () {
    $this->seed();

    actingAs(User::first());

    $this->get(route('transaction.create'))
        ->assertOk();
});

it('create transaction', function () {
    $this->seed();

    $user = User::first();

    Livewire::actingAs($user)
        ->test(CreateTransaction::class)
        ->set('form.date', '2021-01-01')
        ->set('form.amount', 1000)
        ->set('form.type', 'debit')
        ->set('form.method', 'cash')
        ->set('form.category', 'food')
        ->set('form.summary', 'test')
        ->set('form.description', 'test')
        ->call('save')
        ->assertSee('Transaction created successfully');

    $this->assertDatabaseHas('transactions', [
        'user_id' => $user->id,
        'date' => '2021-01-01',
        'amount' => 1000,
        'type' => 'debit',
        'method' => 'cash',
        'category' => 'food',
        'summary' => 'test',
    ]);
});

it('create transaction page is not visible', function () {
    $this->get(route('transaction.create'))
        ->assertSee('Redirecting to http://cashwise.test/login');
});
