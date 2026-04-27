<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('mahasiswa')->insert([
            [
                'npm' => '2300000001',           // Disesuaikan: char(10)
                'nidn' => '1122334455',          // Harus ada di tabel dosen
                'nama' => 'Agus Pratama',        // varchar(50)
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'npm' => '2300000002',           // Disesuaikan: char(10)
                'nidn' => '9988776655',          // Harus ada di tabel dosen
                'nama' => 'Dewi Lestari',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
