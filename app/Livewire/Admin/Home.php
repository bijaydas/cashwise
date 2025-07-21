<?php

declare(strict_types=1);

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\View\View;

class Home extends Component
{
    public function render(): View
    {
        return view('livewire.admin.home')
            ->layoutData([
                'title' => title('Admin Home'),
                'heading' => 'Admin Home',
            ]);
    }
}
