<?php

declare(strict_types=1);

namespace App\Livewire\Auth;

use Illuminate\View\View;
use Livewire\Component;

class LogoutButton extends Component
{
    public function submit()
    {
        $sessionId = session()->getId();
        auth()->user()->logoutSession($sessionId);

        auth()->logout();

        session()->invalidate();
        session()->regenerateToken();

        redirect()->intended(route('login'));
    }

    public function render(): View
    {
        return view('livewire.auth.logout-button');
    }
}
