@props(['title', 'heading' => null, 'description' => null])

<x-layouts.root title="{{ $title }}">
    <div class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:sidebar sticky stashable class="bg-zinc-50 dark:bg-zinc-900 border-r rtl:border-r-0 rtl:border-l border-zinc-200 dark:border-zinc-700">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <flux:brand href="#" name="Cashwise" class="px-2 dark:hidden" />
            <flux:brand href="#" name="Cashwise" class="px-2 hidden dark:flex" />

            <flux:navlist variant="outline">
                <flux:navlist.item icon="home" href="{{ route('home') }}" current>Home</flux:navlist.item>

                <flux:navlist.group expandable heading="Transactions" class="hidden lg:grid">
                    <flux:navlist.item href="{{ route('transaction.create') }}">Create</flux:navlist.item>
                    <flux:navlist.item href="#">Home</flux:navlist.item>
                </flux:navlist.group>
            </flux:navlist>

            <flux:spacer />

            <flux:navlist variant="outline">
                <flux:navlist.item icon="cog-6-tooth" href="#">Settings</flux:navlist.item>
                <flux:navlist.item icon="information-circle" href="#">Help</flux:navlist.item>
            </flux:navlist>

            <flux:dropdown position="top" align="start" class="max-lg:hidden">
                <flux:profile avatar="https://fluxui.dev/img/demo/user.png" name="{{ auth()->user()->getUserName() }}" />

                <flux:menu>
                    <flux:menu.item icon="user">Profile</flux:menu.item>
                    <livewire:auth.logout-button />
                </flux:menu>
            </flux:dropdown>
        </flux:sidebar>

        <flux:main>
            @if($heading)
                <flux:heading size="xl" level="1">{{ $heading }}</flux:heading>
            @endif

            @if($description)
                <flux:text class="mb-6 mt-2 text-base">{{ $description }}</flux:text>
            @endif

            @if($heading || $description)
                <flux:separator variant="subtle" class="my-2" />
            @endif

            {{ $slot }}

        </flux:main>
    </div>
</x-layouts.root>
