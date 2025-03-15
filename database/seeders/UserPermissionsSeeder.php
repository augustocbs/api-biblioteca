<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            // Posts
            'view-post',
            // Produtos
            'view-product',
            // Relatórios
            'view-reports',
        ];

        foreach ($permissions as $permission) {
            if (!Permission::where('name', $permission)->exists()) {
                Permission::create(['name' => $permission, 'guard_name' => 'web']);
            }
        }

        $user = Role::where('name', 'user')->first();
        $user->givePermissionTo($permissions);
    }
}
