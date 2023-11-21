<?php

namespace App\Imports;

use App\Models\pegawai;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;

class PegawaiImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new pegawai([
            'user_id' => $row[0],
            'nama' => $row[2] === 'null' ? $row[1] : $row[1] . ' ' . $row[2],
            'nip' => $row[3] === 'null' ? null : $row[3],
            'jabatan_fungsional' => $row[4] === 'null' ? null : $row[4],
            'tmt_jabatan_fungsional' => $row[5] === 'null' ? null : Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[5])),
            'pendidikan_terakhir' => $row[6] === 'null' ? null : $row[6],
            'unit_kerja' => $row[7] === 'null' ? null : $row[7],
            'jenis_kelamin' => $row[8] === 'null' ? null : $row[8],
            'status' => $row[9] === 'null' ? null : $row[9],
            'tanggal_masuk' => $row[10] === 'null' ? null : Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[10])),
            'tempat_lahir' => $row[12] === 'null' ? null : $row[12],
            'tanggal_lahir' => $row[13] === 'null' ? null : Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[13])),
            'email' => $row[15] === 'null' ? null : $row[15],
        ]);
    }
}
