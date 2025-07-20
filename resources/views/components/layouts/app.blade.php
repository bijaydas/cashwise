@props(['title', 'heading' => null, 'description' => null])

<x-layouts.root title="{{ $title }}">
    <div class="min-h-screen bg-white dark:bg-zinc-800">
        @include('components.layouts.sidenav')

        <flux:main>
            @if($heading)
                <flux:heading size="xl" level="1">{{ $heading }}</flux:heading>
            @endif

            @if($description)
                <flux:text class="text-sm">{{ $description }}</flux:text>
            @endif

            @if($heading || $description)
                <flux:separator variant="subtle" class="my-2" />
            @endif

            {{ $slot }}

        </flux:main>
    </div>
</x-layouts.root>
