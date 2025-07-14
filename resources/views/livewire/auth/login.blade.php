<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-11/12 lg:w-1/2 mx-auto bg-white shadow flex items-center gap-x-10 p-10 rounded-3xl">
        <form wire:submit="submit" class="w-11/12 lg:w-1/2">
            <flux:heading class="text-center font-semibold" size="xl">Welcome back</flux:heading>

            <div class="w-3/4 mx-auto flex flex-col gap-y-4">
                <flux:field>
                    <flux:label>Email</flux:label>
                    <flux:input type="email" wire:model="email" />
                    <flux:error for="email" />
                </flux:field>

                <flux:field>
                    <flux:label>Password</flux:label>
                    <flux:input type="password" wire:model="password" />
                    <flux:error for="password" />
                </flux:field>

                <flux:button type="submit" variant="primary" class="w-full cursor-pointer">Login</flux:button>

                <div class="text-right">
                    <a href="#" class="text-sm text-gray-500 hover:underline">Forgot password?</a>
                </div>

                @include('partials.form-feedback')
            </div>
        </form>

        <div class="hidden lg:block lg:w-1/2">
            <img src="{{ asset('images/login.jpg') }}" alt="login" class="rounded-3xl" />
        </div>
    </div>
</div>
