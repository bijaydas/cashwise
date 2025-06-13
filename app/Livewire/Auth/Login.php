<?php

declare(strict_types=1);

namespace App\Livewire\Auth;

use App\Services\User as UserService;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    #[Validate('required|email')]
    public string $email = '';

    #[Validate('required|min:8')]
    public string $password = '';

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
