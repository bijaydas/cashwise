<?php

declare(strict_types=1);

namespace App\Livewire\Transaction;

use App\Services\Transaction;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public string $search = '';

    protected array $queryString = [
        'search' => ['except' => ''],
    ];

    public function fetchTransactions(): LengthAwarePaginator
    {
        return (new Transaction)->search(
            auth()->user(),
            $this->search,
        );
    }

    public function mount(): void
    {
        $this->resetPage();
    }

    public function submitSearch(): void
    {
        $this->resetPage();
    }

    public function render(): View
    {
        return view('livewire.transaction.index')
            ->with('transactions', $this->fetchTransactions())
            ->layoutData([
                'title' => title('Transactions'),
                'heading' => 'Transactions',
            ]);
    }
}
