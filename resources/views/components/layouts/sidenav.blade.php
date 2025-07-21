<flux:sidebar sticky stashable class="bg-zinc-50 dark:bg-zinc-900 border-r rtl:border-r-0 rtl:border-l border-zinc-200 dark:border-zinc-700">
    <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

    <flux:brand
        logo="https://res.cloudinary.com/bijaydas/image/upload/v1752842493/bijaydas.com/large-icon_rijfid.png"
        href="{{ route('home') }}"
        name="Cashwise"
        class="px-2"
        wire:navigate
    />

    <flux:navlist variant="outline">
        <flux:navlist.item wire:navigate icon="home" href="{{ route('home') }}" current>Home</flux:navlist.item>

        <flux:navlist.group expandable heading="Transactions" class="hidden lg:grid">
            <flux:navlist.item wire:navigate href="{{ route('transaction.create') }}">Create</flux:navlist.item>
            <flux:navlist.item wire:navigate href="{{ route('transaction.index') }}">Home</flux:navlist.item>
        </flux:navlist.group>
    </flux:navlist>

    @if(auth()->user()->isAdmin())
        <flux:text>Admin</flux:text>
        <flux:navlist variant="outline">
            <flux:navlist.group expandable heading="Users" class="hidden lg:grid">
                <flux:navlist.item wire:navigate href="{{ route('admin.user.create') }}">Create</flux:navlist.item>
                <flux:navlist.item wire:navigate href="{{ route('admin.user.index') }}">Home</flux:navlist.item>
            </flux:navlist.group>
        </flux:navlist>
    @endif

    <flux:spacer />

    <flux:navlist variant="outline">
        <flux:navlist.item icon="cog-6-tooth" href="#">Settings</flux:navlist.item>
        <flux:navlist.item icon="information-circle" href="#">Help</flux:navlist.item>
    </flux:navlist>

    <flux:dropdown position="top" align="start" class="max-lg:hidden">
        <flux:profile avatar="https://res.cloudinary.com/bijaydas/image/upload/v1752843411/bijaydas.com/photo_fnblgy.png" name="{{ auth()->user()->getUserName() }}" />

        <flux:menu>
            <flux:menu.item icon="user">Profile</flux:menu.item>
            <livewire:auth.logout-button />
        </flux:menu>
    </flux:dropdown>
</flux:sidebar>