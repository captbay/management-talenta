<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class KetuaKelompokKeahlianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //data
        $data = [
            [
                'user_id' => 182,
                'nama' => 'Dr. Eng. Muhammad Nizam, S.T., M.T.',
                'tanggal_lahir' => '1965-01-01',
            ]
        ];

        foreach ($data as $d) {
            DB::table('ketua_kelompok_keahlians')->insert([
                'user_id' => $d['user_id'],
                'nama' => $d['nama'],
                'tanggal_lahir' => $d['tanggal_lahir'],
            ]);
        }
    }
}
