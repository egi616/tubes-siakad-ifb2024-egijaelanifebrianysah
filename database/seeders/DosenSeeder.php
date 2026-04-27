<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('dosen')->insert([
            ['nidn' => '1122334455', 'nama' => 'Prof. Dr. Budi Santoso', 'created_at' => now(), 'updated_at' => now()],
            ['nidn' => '9988776655', 'nama' => 'Siti Aminah, M.Kom.', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
