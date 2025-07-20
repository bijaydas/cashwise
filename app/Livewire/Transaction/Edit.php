<?php

declare(strict_types=1);

namespace App\Livewire\Transaction;

use App\Livewire\Forms\TransactionEditForm;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use Livewire\Component;

class Edit extends Component
{
    public TransactionEditForm $form;

    public string $id;

    public function mount(string $id): void
    {
        $this->form->fillData($id);
        $this->id = $id;
    }

    public function submit(): void
    {
        $this->form->submit($this->id);

        session()->flash('success', 'Transaction updated successfully.');
    }

    public function render(): View
    {
        $cache = Cache::get(config('cache.constants'));

        return view('livewire.transaction.edit')
            ->with([
                'categories' => $cache['category'],
                'methods' => $cache['method'],
                'types' => $cache['type'],
            ])
            ->layoutData([
                'title' => title('Edit Transaction'),
                'heading' => 'Edit Transaction',
            ]);
    }
}
