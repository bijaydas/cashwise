<?php

declare(strict_types=1);

use App\Livewire\Auth\Login;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

it('login page visible', function () {
    Livewire::test(Login::class)
        ->assertSee('Welcome back');
});

it('user can login', function () {
    $this->seed();
    Livewire::test(Login::class)
        ->set('email', 'test@test.com')
        ->set('password', 'secretpassword')
        ->call('submit')
        ->assertRedirect('/');
});

it('invalid credentials', function () {
    $this->seed();
    Livewire::test(Login::class)
        ->set('email', 'fake@test.com')
        ->set('password', 'secretpassword')
        ->call('submit')
        ->assertSee('Invalid credentials');
});
