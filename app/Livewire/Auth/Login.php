<?php

declare(strict_types=1);

namespace App\Livewire\Auth;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Services\User as UserService;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    #[Validate('required|email')]
    public string $email = 'me@bijaydas.com';

    #[Validate('required|min:8')]
    public string $password = 'Admin@#8855';

    public function submit(): void
    {
        $this->validate();

        try {
            if (! Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
                throw new \InvalidArgumentException('Invalid credentials');
            }

            $service = new UserService;

            $sessionId = session()->getId();

            \auth()->user()->createLoginSession($sessionId);

            $this->redirect(route('dashboard'));

        } catch (\Throwable $e) {
            $this->addError('error', $e->getMessage());
        }

    }

    public function render(): View
    {
        return view('livewire.auth.login')
            ->layoutData(['title' => title('Login')]);
    }
}
