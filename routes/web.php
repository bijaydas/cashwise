<?php

declare(strict_types=1);

use App\Livewire\Home;
use App\Livewire\Transaction\Create as CreateTransaction;
use App\Livewire\Transaction\Edit as TransactionEdit;
use App\Livewire\Transaction\Index as TransactionIndex;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';

Route::middleware('auth')->group(function () {
    Route::get('/', Home::class)->name('home');

    Route::prefix('transaction')->name('transaction.')->group(function () {
        Route::get('/create', CreateTransaction::class)->name('create');
        Route::get('/', TransactionIndex::class)->name('index');
        Route::get('/{id}/edit', TransactionEdit::class)->name('edit');
    });
});
