<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Home as AdminHome;
use App\Livewire\Admin\User\Index as UserIndex;
use App\Livewire\Admin\User\Edit;
use App\Livewire\Admin\User\Create;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', AdminHome::class)->name('home');

    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/', UserIndex::class)->name('index');
        Route::get('/create', Create::class)->name('create');
        Route::get('/{id}/edit', Edit::class)->name('edit');
    });
});
