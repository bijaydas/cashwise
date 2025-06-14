<div class="flex h-screen">
    <x-layouts.sidenav />
    <div class="flex-1 overflow-auto">
        <x-layouts.header />
        <div>
            {{ $slot }}
        </div>
    </div>
</div>
