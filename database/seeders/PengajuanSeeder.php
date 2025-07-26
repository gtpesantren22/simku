<?php

namespace Database\Seeders;

use App\Models\Pengajuan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengajuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Pengajuan::create([
        //     'no' => '001',
        //     'tanggal' => '2025-07-21',
        //     'status' => 'proses',
        //     'lembaga_id' => '1',
        // ]);
        Pengajuan::create([
            'no' => '002',
            'tanggal' => '2025-07-21',
            'status' => 'proses',
            'lembaga_id' => '2',
        ]);
    }
}
