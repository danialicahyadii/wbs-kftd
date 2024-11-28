<?php

namespace Database\Seeders;

use App\Models\JenisPelanggaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisPelanggaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JenisPelanggaran::create([
            'nama' => 'Benturan Kepentingan',
        ]);

        JenisPelanggaran::create([
            'nama' => 'Penyuapan dan Kecurangan',
        ]);

        JenisPelanggaran::create([
            'nama' => 'Gratifikasi',
        ]);

        JenisPelanggaran::create([
            'nama' => 'Indispliner',
        ]);

        JenisPelanggaran::create([
            'nama' => 'Pelanggaran Etika dan Moral',
        ]);

        JenisPelanggaran::create([
            'nama' => 'Pelanggaran Prosedur',
        ]);
    }
}
