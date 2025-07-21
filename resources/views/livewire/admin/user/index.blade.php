<div>
    <table class="w-full">
        <thead>
            <tr class="bg-zinc-100">
                <th>#id</th>
                <th class="text-left">Name</th>
                <th class="text-left">Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @if ($users->count() === 0)
                <tr>
                    <td colspan="5" class="text-center">No data found</td>
                </tr>
            @endif

            @foreach($users as $user)
                <tr class="border-b border-zinc-200">
                    <td class="text-center py-1">{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="text-center">
                        <x-partials.user-role role="{{ $user->getRoleNames()->first() }}" />
                    </td>
                    <td class="text-center">
                        <x-partials.account-status status="{{ $user->account_status }}" />
                    </td>
                    <td class="text-center">
                        <flux:button size="sm">Edit</flux:button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
