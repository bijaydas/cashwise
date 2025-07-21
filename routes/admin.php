<?php

declare(strict_types=1);

use App\Livewire\Admin\Home as AdminHome;
use App\Livewire\Admin\User\Create;
use App\Livewire\Admin\User\Edit;
use App\Livewire\Admin\User\Index as UserIndex;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->name('admin.')
    ->middleware('check-admin-access')
    ->group(function () {
        Route::get('/', AdminHome::class)->name('home');

        Route::prefix('user')->name('user.')->group(function () {
            Route::get('/', UserIndex::class)->name('index');
            Route::get('/create', Create::class)->name('create');
            Route::get('/{id}/edit', Edit::class)->name('edit');
        });
    });
