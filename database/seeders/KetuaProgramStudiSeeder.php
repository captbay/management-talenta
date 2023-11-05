<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class KetuaProgramStudiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //data
        $data = [
            [
                'user_id' => 183,
                'nama' => 'Dr. sukis, S.T., M.T.',
                'tanggal_lahir' => '1965-01-01',
            ]
        ];

        foreach ($data as $d) {
            DB::table('ketua_program_studis')->insert([
                'user_id' => $d['user_id'],
                'nama' => $d['nama'],
                'tanggal_lahir' => $d['tanggal_lahir'],
            ]);
        }
    }
}
