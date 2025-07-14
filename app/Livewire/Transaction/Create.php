<?php

declare(strict_types=1);

namespace App\Livewire\Transaction;

use App\Livewire\Forms\TransactionForm;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use Livewire\Component;

class Create extends Component
{
    public TransactionForm $form;

    public function mount(): void
    {
        $this->form->date = now()->format('Y-m-d');
    }

    public function submit(): void
    {
        $this->form->store();

        $this->resetFields();
    }

    public function resetFields(): void
    {
        $this->form->reset();
    }

    public function render(): View
    {
        $cache = Cache::get(config('cache.constants'));

        return view('livewire.transaction.create')
            ->with([
                'categories' => $cache['category'],
                'methods' => $cache['method'],
                'types' => $cache['type'],
            ])
            ->layoutData([
                'title' => title('Create Transaction'),
                'heading' => 'Create Transaction',
            ]);
    }
}
