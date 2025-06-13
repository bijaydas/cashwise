<div>
    <div class="w-1/4 mx-auto mt-10">
        <div>
            <a href="#">
                <img src="{{ asset('images/tmp/logo.png') }}" alt="logo" class="w-24 mx-auto">
            </a>
            <h1 class="text-center text-3xl font-bold">Welcome back</h1>
        </div>

        <form wire:submit="submit" action="#" class="flex flex-col gap-y-3">

            <x-form.input name="email" id="email" type="email" label="Email" wire:model="email" />

            <x-form.input name="password" id="password" type="password" label="Password" wire:model="password" />

            <button class="btn w-full">Login</button>

            <div class="text-right">
                <a href="#" class="text-sm text-gray-500 hover:underline">Forgot password?</a>
            </div>

            @include('shared.response')
        </form>
    </div>
</div>
