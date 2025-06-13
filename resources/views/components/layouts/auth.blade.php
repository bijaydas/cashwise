<div class="flex h-screen overflow-hidden">
    <x-layouts.sidenav />
    <div class="flex-1">
        <x-layouts.header />
        <div class="h-full">
            {{ $slot }}
        </div>
    </div>
</div>
