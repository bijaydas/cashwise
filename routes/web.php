<?php

declare(strict_types=1);

use App\Livewire\Auth\Login;
use App\Livewire\Home;
use App\Livewire\Transaction\Create as CreateTransaction;
use App\Livewire\Transaction\Index as TransactionIndex;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/', Home::class)->name('home');

    Route::prefix('transaction')->name('transaction.')->group(function () {
        Route::get('/create', CreateTransaction::class)->name('create');
        Route::get('/', TransactionIndex::class)->name('index');
    });
});
