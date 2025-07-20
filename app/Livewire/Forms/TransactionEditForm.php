<?php

declare(strict_types=1);

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class TransactionEditForm extends Form
{
    #[Validate('required|date')]
    public string $date = '';

    #[Validate('required|numeric')]
    public string $amount = '';

    #[Validate('required')]
    public string $type = '';

    #[Validate('required')]
    public string $method = '';

    #[Validate('required')]
    public string $category = '';

    public string $summary = '';

    public function fillData(string $id): void
    {
        $transaction = auth()->user()->transactions()->findOrFail($id);

        $this->date = $transaction->date->format('Y-m-d');
        $this->amount = (string) $transaction->amount;
        $this->type = $transaction->type;
        $this->method = $transaction->method;
        $this->category = $transaction->category;
        $this->summary = $transaction->summary;
    }

    public function submit(string $id): void
    {
        $this->validate();

        $transaction = auth()->user()->transactions()->findOrFail($id)
            ->update($this->toArray());
    }
}
