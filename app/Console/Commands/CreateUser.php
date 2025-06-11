<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Services\User as UserService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\URL;
use Spatie\Permission\Models\Role as RoleModel;

class CreateUser extends Command
{
    protected $signature = 'cashwise:create {item}';

    protected $description = 'This command will create.';

    private UserService $service;

    public function __construct()
    {
        parent::__construct();

        $this->service = new UserService;
    }

    /**
     * @throw \InvalidArgumentException
     */
    private function getEmail(): string
    {
        $email = $this->ask('Enter email');

        /**
         * Check if the email is valid
         */
        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('Invalid email');
        }

        /**
         * Check if the email is already taken
         */
        if ($this->service->isEmailTaken($email)) {
            throw new \InvalidArgumentException('Email already taken');
        }

        return $email;
    }

    /**
     * @throw \InvalidArgumentException
     */
    private function getPassword(): string
    {
        $password = $this->secret('Enter password');

        /**
         * Check password length
         */
        if (strlen($password) < 8) {
            throw new \InvalidArgumentException('Password must be at least 8 characters');
        }

        return $password;
    }

    private function getRole(): string
    {
        return $this->choice('Select role', RoleModel::all()->pluck('name')->toArray());
    }

    /**
     * Get the user's name. (Optional)
     */
    private function getUserName(): ?string
    {
        return $this->ask('Enter name', null);
    }

    private function createUser(): void
    {
        $name = $this->getUserName();
        $email = $this->getEmail();
        $password = $this->getPassword();
        $role = $this->getRole();

        $this->service->create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'role' => $role,
        ]);

        $this->info(sprintf('User created successfully. Visit %s to login.', URL::to('/login')));
    }

    public function handle(): void
    {
        $item = $this->argument('item');

        if ($item === 'user') {
            $this->createUser();
        }
    }
}
