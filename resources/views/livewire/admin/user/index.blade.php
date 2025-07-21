<div>
    <table class="w-full">
        <thead>
            <tr class="bg-zinc-100">
                <th>#id</th>
                <th class="text-left">Name</th>
                <th class="text-left">Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Created on</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($users as $user)
                <tr class="border-b border-zinc-200">
                    <td class="text-center py-2">
                        <flux:text>{{ $user->id }}</flux:text>
                    </td>
                    <td>
                        <flux:text>{{ $user->name }}</flux:text>
                    </td>
                    <td>
                        <flux:text>{{ $user->email }}</flux:text>
                    </td>
                    <td class="text-center">
                        <x-partials.user-role role="{{ $user->getRoleNames()->first() }}" />
                    </td>
                    <td class="text-center">
                        <x-partials.account-status status="{{ $user->account_status }}" />
                    </td>
                    <td class="text-center">
                        <flux:text>
                            {{ $user->created_at->diffForHumans() }}
                        </flux:text>
                    </td>
                    <td class="text-center">
                        <flux:button href="{{ route('admin.user.edit', ['id'=> $user->id]) }}" size="sm">Edit</flux:button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
