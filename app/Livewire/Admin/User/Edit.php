<?php

declare(strict_types=1);

namespace App\Livewire\Admin\User;

use App\Livewire\Forms\UserEditForm;
use Illuminate\View\View;
use Livewire\Component;

class Edit extends Component
{
    public UserEditForm $form;

    public string $id;

    public function mount(string $id): void
    {
        $this->id = $id;

        $this->form->setup($id);
    }

    public function submit(): void
    {
        $this->form->update($this->id);

        session()->flash('success', 'User updated successfully.');
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
