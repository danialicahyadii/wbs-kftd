<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::create([
            'nama' => 'Created',
            'warna' => 'primary',
        ]);

        Status::create([
            'nama' => 'Verifikasi',
            'warna' => 'warning',
        ]);

        Status::create([
            'nama' => 'Monitoring & Evaluasi',
            'warna' => 'info',
        ]);

        Status::create([
            'nama' => 'Investigasi',
            'warna' => 'secondary',
        ]);

        Status::create([
            'nama' => 'Sanksi',
            'warna' => 'danger',
        ]);

        Status::create([
            'nama' => 'Selesai',
            'warna' => 'success',
        ]);
    }
}
