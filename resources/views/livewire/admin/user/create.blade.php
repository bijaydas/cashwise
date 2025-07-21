<div class="layout-form-wrapper">
    <form wire:submit="submit">
        <div class="grid grid-cols-2 gap-4">
            <flux:input type="text" label="Email" wire:model="form.email" badge="required" />
            <flux:input type="password" label="Password" wire:model="form.password" badge="required" />

            <flux:input type="text" label="Name" wire:model="form.name" />
            <flux:input type="text" label="Nickname" wire:model="form.nickname" />
            <flux:input type="date" label="Birthday" wire:model="form.date_of_birth" />
            <flux:input type="date" label="Anniversary Date" wire:model="form.date_of_anniversary" />
            <flux:input type="text" label="Primary phone" wire:model="form.primary_phone" />
            <flux:input type="text" label="Secondary phone" wire:model="form.secondary_phone" />

            <flux:radio.group label="Gender" wire:model="form.gender">
                <flux:radio value="male" label="Male" />
                <flux:radio value="female" label="Female" />
                <flux:radio value="not-specified" label="Not specified" />
            </flux:radio.group>

            <flux:radio.group label="Role" wire:model="form.role">
                <flux:radio value="admin" label="Admin" description="Can do anything." />
                <flux:radio value="user" label="User" description="User can only do basic things." />
            </flux:radio.group>
        </div>

        <div class="flex justify-end gap-4 mt-4">
            <flux:button type="reset" icon-trailing="arrow-path" class="cursor-pointer">Reset</flux:button>
            <flux:button type="submit" variant="primary" icon-trailing="arrow-right" class="cursor-pointer">Create</flux:button>
        </div>

        @include('partials.form-feedback')
    </form>
</div>
