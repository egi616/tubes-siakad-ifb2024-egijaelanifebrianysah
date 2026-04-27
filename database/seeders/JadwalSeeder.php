<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('jadwal')->insert([
            [
                'kode_matakuliah' => 'IF202401', // Harus ada di tabel matakuliah
                'nidn' => '1122334455',          // Harus ada di tabel dosen
                'kelas' => 'A',
                'hari' => 'Senin',
                'jam' => '08:00:00',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode_matakuliah' => 'IF202402', 
                'nidn' => '9988776655',          
                'kelas' => 'B',
                'hari' => 'Selasa',
                'jam' => '10:30:00',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
