<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'adminwbs@kftd.co.id',
            'password' => bcrypt('admin123')
        ]);

        Status::create([
            'nama' => 'Verifikasi',
            'warna' => 'warning',
        ]);
    }
}
