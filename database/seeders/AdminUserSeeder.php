<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $initialRole = Role::query()
            ->where('name', 'Admin')
            ->first();

        $user = User::factory()->create([
            'name' => 'Admin',
            'last_name' => 'Dev',
            'email' => 'admin@dev.com',
        ]);

        $user->assignRole($initialRole);
    }
}
