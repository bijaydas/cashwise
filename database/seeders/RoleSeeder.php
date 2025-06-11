<?php

namespace Database\Seeders;

use App\Enums\Permission as PermissionEnum;
use App\Enums\UserRole as RoleEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    private function createRoles(): void
    {
        $roles = RoleEnum::dbInsert();
        Role::insert($roles);
    }

    public function createPermissions(): void
    {
        $permissions = PermissionEnum::dbInsert();
        Permission::insert($permissions);
    }

    private function roleHasPermissions(): void
    {
        /**
         * @todo
         * If permissions are added, this will need to be updated.
         */
        $admin = Role::findByName('admin');
        $admin->givePermissionTo(Permission::all());
    }

    public function run(): void
    {
        $this->createRoles();
        $this->createPermissions();
        $this->roleHasPermissions();
    }
}
