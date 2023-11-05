<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // seed user
        $this->call(UserSeeder::class);
        // seed dosen
        $this->call(DosenSeeder::class);
        // seed pegawai
        $this->call(PegawaiSeeder::class);
        // seed ketua kelompok keahlian
        $this->call(KetuaKelompokKeahlianSeeder::class);
        // seed kepala urusan sumber daya
        $this->call(KepalaUrusanSumberDayaSeeder::class);
        // seed ketua program studi
        $this->call(KetuaProgramStudiSeeder::class);
        // seed bidang II
        $this->call(BidangIISeeder::class);
    }
}
