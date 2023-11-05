<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KepalaUrusanSumberDayaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //data
        $data = [
            [
                'user_id' => 181,
                'nama' => 'Dr. Ir. H. M. Syaiful Anwar, M.Si.',
                'tanggal_lahir' => '1965-01-01',
            ]
        ];

        foreach ($data as $d) {
            DB::table('kepala_urusan_sumber_dayas')->insert([
                'user_id' => $d['user_id'],
                'nama' => $d['nama'],
                'tanggal_lahir' => $d['tanggal_lahir'],
            ]);
        }
    }
}
