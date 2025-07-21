<?php

declare(strict_types=1);

namespace App\Livewire\Admin\User;

use App\Livewire\Forms\UserStoreForm;
use Illuminate\View\View;
use Livewire\Component;

class Create extends Component
{
    public UserStoreForm $form;

    public function submit(): void
    {
        $this->form->store();

        session()->flash('success', 'User created successfully.');
    }

    public function render(): View
    {
        return view('livewire.admin.user.create')
            ->layoutData([
                'title' => title('Create User'),
                'heading' => 'Create User',
            ]);
    }
}
