<?php

declare(strict_types=1);

namespace App\Livewire\Auth;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    #[Validate('required|email')]
    public string $email = 'me@bijaydas.com';

    #[Validate('required')]
    public string $password = 'password';

    public function submit()
    {
        $this->validate();

        try {
            if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
                $sessionId = session()->getId();

                auth()->user()->createLoginSession($sessionId);

                return redirect()->intended(route('home'));
            }

            $this->addError('error', 'Invalid credentials');
        } catch (\Throwable $e) {
            $this->addError('error', $e->getMessage());
        }
    }

    #[Layout('components.layouts.guest')]
    public function render(): View
    {
        return view('livewire.auth.login')
            ->layoutData(['title' => title('Login')]);
    }
}
