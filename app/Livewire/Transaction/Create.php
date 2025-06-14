<?php

namespace App\Livewire\Transaction;

use App\Livewire\Forms\TransactionForm;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use Livewire\Component;

class Create extends Component
{
    public TransactionForm $form;

    public function save(): void
    {
        $this->form->store();
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
            ->layoutData(['title' => title('Create Transaction')]);
    }
}
