<x-layouts.auth>
    <div class="w-1/3 p-8">
        <h1 class="text-3xl font-semibold mb-4 text-gray-700">Add transaction</h1>

        <form wire:submit="save" action="#" class="flex flex-col space-y-4">
            <div class="flex space-x-2">
                <x-form.input id="date" name="form.date" label="Date" type="date" wire:model="form.date" />
                <x-form.input id="amount" name="form.amount" label="Amount" type="number" wire:model="form.amount" />
            </div>

            <div>
                <label class="text-gray-700" for="method-type">Type</label>

                <div class="flex space-x-2">
                    <x-form.radio-button
                        for="debit"
                        id="debit"
                        value="debit"
                        label="Debit"
                        name="type"
                        wire:model="form.type"
                    />

                    <x-form.radio-button
                        for="credit"
                        id="credit"
                        value="credit"
                        label="Credit"
                        name="type"
                        wire:model="form.type"
                    />
                </div>
            </div>

            <div class="flex space-x-2">
                <x-form.select name="form.method" label="Method" containerClass="w-1/2" :data="$methods" wire:model="form.method" />
                <x-form.select name="form.category" label="Category" containerClass="w-1/2" :data="$categories" wire:model="form.category" />
            </div>

            <x-form.input id="summary" name="summary" label="Summary (Optional)" type="text" wire:model="form.summary" />

            <div class="form-control">
                <span class="label">Description (Optional)</span>
                <textarea class="form-input" rows="5" wire:model="form.description"></textarea>
            </div>

            <div class="flex justify-end space-x-2">
                <button wire:click="resetFields" type="reset" class="btn secondary">Reset</button>
                <button type="submit" class="btn primary">Save</button>
            </div>

            @include('shared.response')
        </form>
    </div>
</x-layouts.auth>
