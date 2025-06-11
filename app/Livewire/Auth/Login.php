<?php

declare(strict_types=1);

namespace App\Livewire\Auth;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Login extends Component
{
    public function render(): View
    {
        return view('livewire.auth.login')
            ->layoutData(['title' => title('Login')]);
    }
}
