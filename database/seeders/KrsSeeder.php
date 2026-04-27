<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KrsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('krs')->insert([
            [
                'npm' => '202300000000001',      // Harus ada di tabel mahasiswa
                'kode_matakuliah' => 'IF202401', // Harus ada di tabel matakuliah
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'npm' => '202300000000002',
                'kode_matakuliah' => 'IF202402',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
