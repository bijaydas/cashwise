<?php

namespace App\Livewire\Forms;

use App\Services\Transaction;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TransactionStoreForm extends Form
{
    #[Validate('required|date')]
    public string $date = '';

    #[Validate('required|numeric')]
    public string $amount = '';

    #[Validate('required')]
    public string $type = 'debit';

    #[Validate('required')]
    public string $method = 'cash';

    #[Validate('required')]
    public string $category = 'food';

    public string $summary = '';

    public function store(): void
    {
        $this->validate();

        app(Transaction::class)->create(auth()->user(), $this->toArray());

        session()->flash('success', 'Transaction created successfully');
    }
}
