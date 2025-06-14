<?php

declare(strict_types=1);

use App\Services\User as UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('should create a user', function () {
    $this->seed();

    $email = fake()->email();

    $user = app(UserService::class)->create([
        'email' => $email,
        'password' => 'HelloWorld',
    ]);

    $this->assertDatabaseHas('users', [
        'email' => $email,
    ]);
});

it('should throw an exception', function () {
    $this->seed();

    expect(function () {
        app(UserService::class)->create([
            'email' => 'meatbijaydas.com',
            'password' => 'HelloWorld',
        ]);
    })->toThrow(InvalidArgumentException::class, 'Invalid email address.');
});

it('email already exists', function () {
    $this->seed();

    $email = fake()->email();

    app(UserService::class)->create([
        'email' => $email,
        'password' => 'HelloWorld',
    ]);

    expect(function () use ($email) {
        app(UserService::class)->create([
            'email' => $email,
            'password' => 'HelloWorld',
        ]);
    })
        ->toThrow(InvalidArgumentException::class, 'Email is already taken.');
});
