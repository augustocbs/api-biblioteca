<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            // Usuários
            'view-user', 'create-user', 'edit-user', 'delete-user',
            // Posts
            'view-post', 'create-post', 'edit-post', 'delete-post', 'publish-post', 'unpublish-post',
            // Produtos
            'view-product', 'create-product', 'edit-product', 'delete-product', 'manage-stock',
            // Pedidos
            'view-order', 'create-order', 'edit-order', 'delete-order', 'process-order', 'cancel-order',
            // Relatórios
            'view-reports', 'generate-reports', 'export-reports',
            // Configurações
            'view-settings', 'edit-settings', 'manage-users', 'assign-roles'
        ];

        foreach ($permissions as $permission) {
            if (!Permission::where('name', $permission)->exists()) {
                Permission::create(['name' => $permission, 'guard_name' => 'web']);
            }
        }

        $admin = Role::where('name', 'admin')->first();
        $admin->givePermissionTo($permissions);
    }
}
