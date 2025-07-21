<?php

declare(strict_types=1);

namespace App\Livewire\Admin\User;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\User as UserModel;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render(): View
    {
        return view('livewire.admin.user.index')
            ->with('users', UserModel::get())
            ->layoutData([
                'title' => title('Users'),
                'heading' => 'Manage Users',
            ]);
    }
}
