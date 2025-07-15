<div>
    <form wire:submit="submitSearch" class="flex items-center space-x-2">
        <flux:input placeholder="Search" icon="magnifying-glass" type="search" wire:model="search">
            <x-slot name="iconTrailing">
                <flux:button icon="x-mark" variant="subtle" type="button" size="sm" />
            </x-slot>
        </flux:input>
        <flux:button type="button" variant="primary">Search</flux:button>
    </form>

    <div>
        <table class="w-full mt-4">
            <thead class="bg-gray-100">
                <tr>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Category</th>
                    <th>Method</th>
                    <th>Type</th>
                    <th>Summary</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($transactions as $transaction)
                <tr class="text-gray-700 text-center border-b border-gray-100">
                    <td class="p-1">{{ $transaction->date }}</td>
                    <td class="p-1">{{ $transaction->amount }}</td>
                    <td class="p-1">{{ $transaction->category }}</td>
                    <td class="p-1">{{ $transaction->method }}</td>
                    <td class="p-1">{{ $transaction->type }}</td>
                    <td class="p-1 text-left">{{ $transaction->summary }}</td>
                    <td class="p-1">
                        <flux:button type="button" size="sm">Edit</flux:button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div>
            {{ $transactions->links() }}
        </div>
    </div>
</div>
