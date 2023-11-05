<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [];

        for ($i = 1; $i <= 154; $i++) {
            $data[] = [
                'username' => 'dosen' . $i,
                'password' => 'dosen' . $i,
                'role' => 'Dosen',
            ];
        }

        for ($i = 1; $i <= 26; $i++) {
            $data[] = [
                'username' => 'pegawai' . $i,
                'password' => 'pegawai' . $i,
                'role' => 'Pegawai',
            ];
        }

        for ($i = 1; $i <= 1; $i++) {
            $data[] = [
                'username' => 'kepalaurusansumberdaya', // . $i,
                'password' => 'kepalaurusansumberdaya', // . $i,
                'role' => 'Kepala Urusan Sumber Daya',
            ];
        }


        for ($i = 1; $i <= 1; $i++) {
            $data[] = [
                'username' => 'ketuakelompokkeahlian', // . $i,
                'password' => 'ketuakelompokkeahlian', //. $i,
                'role' => 'Ketua Kelompok Keahlian',
            ];
        }

        for ($i = 1; $i <= 1; $i++) {
            $data[] = [
                'username' => 'kaprodi', // . $i,
                'password' => 'kaprodi', // . $i,
                'role' => 'Ketua Program Studi',
            ];
        }

        for ($i = 1; $i <= 1; $i++) {
            $data[] = [
                'username' => 'bidangII', // . $i,
                'password' => 'bidangII', // . $i,
                'role' => 'Bidang II',
            ];
        }

        foreach ($data as $d) {
            DB::table('users')->insert([
                'username' => $d['username'],
                'password' => Hash::make($d['password']),
                'role' => $d['role'],
            ]);
        }
    }
}
