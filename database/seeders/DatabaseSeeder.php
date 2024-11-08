<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'Admin WBS',
            'email' => 'adminwbs@kftd.co.id',
            'password' => bcrypt('admin123')
        ]);
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'User']);
        $user->assignRole('Admin');

        Status::create([
            'nama' => 'Created',
            'warna' => 'primary',
        ]);
    }
}
