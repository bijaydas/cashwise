<?php

declare(strict_types=1);

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\URL;

uses(RefreshDatabase::class);

it('invalid email and wrong password', function () {
    $this->seed();

    $this->artisan('cashwise:create user')
        ->expectsQuestion('Enter name', 'Bijay Das>')
        ->expectsQuestion('Enter email', 'meatbijaydas.com')
        ->expectsOutput('Invalid email');

    $this->artisan('cashwise:create user')
        ->expectsQuestion('Enter name', 'Bijay Das>')
        ->expectsQuestion('Enter email', 'mea@bijaydas.com')
        ->expectsQuestion('Enter password', 'hello')
        ->expectsOutput('Password must be at least 8 characters');
});

it('should create a user', function () {
    $this->seed();

    $this->artisan('cashwise:create user')
        ->expectsQuestion('Enter name', 'Bijay Das>')
        ->expectsQuestion('Enter email', fake()->email())
        ->expectsQuestion('Enter password', 'HelloWorld')
        ->expectsChoice('Select role', 'user', ['user', 'admin'])
        ->expectsOutput(sprintf('User created successfully. Visit %s to login.', URL::to('/login')));

    $this->assertDatabaseHas('users', [
        'email' => 'me@bijaydas.com',
    ]);
});
