<?php

declare(strict_types=1);

namespace App\Livewire\Admin\User;

use Livewire\Component;
use Illuminate\View\View;
use App\Services\User as UserService;

class Edit extends Component
{
    public function mount(string $id): void
    {

    }

    public function render(): View
    {
        return view('livewire.admin.user.edit')
            ->layoutData([
                'title' => title('Edit User'),
                'heading' => 'Edit User',
            ]);
    }
}
