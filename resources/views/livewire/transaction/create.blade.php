<div class="layout-form-wrapper">
    <form action="#" class="grid gap-6" wire:submit="submit">
        <div class="grid grid-cols-2 gap-6">
            <flux:field>
                <flux:label>Date</flux:label>
                <flux:input wire:model="form.date" type="date" />
                <flux:error name="form.date" />
            </flux:field>

            <flux:field>
                <flux:label>Amount</flux:label>
                <flux:input wire:model="form.amount" type="number" />
                <flux:error name="form.amount" />
            </flux:field>
        </div>

        <flux:field>
            <flux:label>Transaction Type</flux:label>
            <flux:radio.group wire:model="form.type">
                <flux:radio value="debit" label="Debit" description="All expenses should come here" />
                <flux:radio value="credit" label="Credit" description="All incomes should come here" />
            </flux:radio.group>
        </flux:field>

        <div class="grid grid-cols-2 gap-6">
            <flux:field>
                <flux:label>Transaction Method</flux:label>
                <flux:select wire:model="form.method">
                    @foreach ($methods as $method)
                        <flux:select.option value="{{ $method }}">{{ $method }}</flux:select.option>
                    @endforeach
                </flux:select>
            </flux:field>

            <flux:field>
                <flux:label>Transaction Category</flux:label>
                <flux:select wire:model="form.category">
                    @foreach ($categories as $category)
                        <flux:select.option value="{{ $category }}">{{ $category }}</flux:select.option>
                    @endforeach
                </flux:select>
            </flux:field>
        </div>

        <div class="grid grid-cols-2 gap-6">
            <flux:field>
                <flux:label badge="Optional">Summary</flux:label>
                <flux:textarea wire:model="form.summary" />
                <flux:error name="form.summary" />
            </flux:field>
        </div>

        <div class="flex justify-end gap-2 items-center">
            <flux:button type="reset" icon-trailing="backspace" class="cursor-pointer" wire:click="resetFields">Reset</flux:button>
            <flux:button type="submit" variant="primary" icon-trailing="arrow-right" class="cursor-pointer">Create</flux:button>
        </div>
    </form>

    @include('partials.form-feedback')
</div>
