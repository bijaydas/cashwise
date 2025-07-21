<div class="grid grid-cols-6 gap-4">
    <div class="flex items-center justify-between shadow-lg p-4 rounded-lg relative">
        <div>
            <flux:heading size="lg">Manage users</flux:heading>
            <flux:text size="sm" class="mt-1">
                Manage users and their roles.
            </flux:text>
        </div>
        <div>
            <flux:icon.users class="w-12 h-12 text-gray-500" />
        </div>

        <a href="{{ route('admin.user.index') }}" class="-inset-0 absolute"></a>
    </div>
</div>
