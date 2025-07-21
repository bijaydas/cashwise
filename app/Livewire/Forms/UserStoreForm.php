<?php

declare(strict_types=1);

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Services\User as UserService;

class UserStoreForm extends Form
{
    #[Validate('required|email|unique:users,email')]
    public string $email = '';

    #[Validate('required|min:8')]
    public string $password = '';

    #[Validate('string')]
    public string $name = '';

    #[Validate('string')]
    public string $nickname = '';

    #[Validate('date')]
    public string $date_of_birth = '';

    #[Validate('date')]
    public string $date_of_anniversary = '';

    #[Validate('string')]
    public string $primary_phone = '';

    #[Validate('string')]
    public string $secondary_phone = '';

    #[Validate('string')]
    public string $role = 'user';

    #[Validate('string')]
    public string $gender = 'not-specified';

    public function store(): void
    {
        app(UserService::class)->create($this->validate());

        $this->reset();
    }
}
