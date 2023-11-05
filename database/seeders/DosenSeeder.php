<?php

namespace Database\Seeders;

use App\Imports\DosenImport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;


class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Excel::import(new DosenImport, storage_path('app/dosen.xlsx'));
    }
}
