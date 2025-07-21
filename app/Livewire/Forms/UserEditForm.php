<?php

declare(strict_types=1);

namespace App\Livewire\Forms;

use App\Enums\UserRole;
use App\Services\User as UserService;
use Illuminate\Validation\Rule;
use Livewire\Form;

class UserEditForm extends Form
{
    public string $email = '';

    public string $password = '';

    public string $name = '';

    public string $nickname = '';

    public string $date_of_birth = '';

    public string $date_of_anniversary = '';

    public string $primary_phone = '';

    public string $secondary_phone = '';

    public string $role = 'user';

    public string $gender = 'not-specified';

    public function update(string $id): void
    {
        $validatedData = $this->validate([
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'nullable|string|min:8',
            'name' => 'nullable|string',
            'nickname' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'date_of_anniversary' => 'nullable|date',
            'primary_phone' => 'nullable|string',
            'secondary_phone' => 'nullable|string',
            'role' => [
                'nullable',
                Rule::in(UserRole::getValuesForSelect()),
            ],
            'gender' => [
                'nullable',
                Rule::in(['not-specified', 'male', 'female']),
            ],
        ]);

        app(UserService::class)->update(
            $id,
            $validatedData,
        );
    }

    public function setup(string $id): void
    {
        $user = app(UserService::class)->findById($id);

        $this->email = $user->email;
        $this->name = $user->name ?? '';
        $this->nickname = $user->nickname ?? '';
        $this->date_of_birth = $user->date_of_birth ?? '';
        $this->date_of_anniversary = $user->date_of_anniversary ?? '';
        $this->primary_phone = $user->primary_phone ?? '';
        $this->secondary_phone = $user->secondary_phone ?? '';
        $this->gender = $user->gender ?? 'not-specified';
        $this->role = $user->getRoleNames()->first();
    }
}
