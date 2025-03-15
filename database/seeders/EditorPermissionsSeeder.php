<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class EditorPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            // Posts
            'view-post', 'create-post', 'edit-post', 'delete-post', 'publish-post', 'unpublish-post',
            // Produtos
            'view-product', 'create-product', 'edit-product', 'delete-product', 'manage-stock',
            // Relatórios
            'view-reports', 'generate-reports', 'export-reports',
        ];

        foreach ($permissions as $permission) {
            if (!Permission::where('name', $permission)->exists()) {
                Permission::create(['name' => $permission, 'guard_name' => 'web']);
            }
        }

        $editor = Role::where('name', 'editor')->first();
        $editor->givePermissionTo($permissions);
    }
}
