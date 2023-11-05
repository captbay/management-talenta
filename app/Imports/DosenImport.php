<?php

namespace App\Imports;

use App\Models\dosen;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;

class DosenImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new dosen([
            'user_id' => $row[0],
            'nama' => $row[1] === 'null' ? null : $row[1],
            'nidn' => $row[2] === 'null' ? null : $row[2],
            'nip' => $row[3] === 'null' ? null : $row[3],
            'kode_dosen' => $row[4] === 'null' ? null : $row[4],
            'jfa' => $row[5] === 'null' ? null : $row[5],
            'tmt_jad' => $row[6] === 'null' ? null : Carbon::parse($row[6])->format('Y-m-d'),
            'golongan' => $row[7] === 'null' ? null : $row[7],
            'tmt_inpassing' => $row[8] === 'null' ? null : Carbon::parse($row[8])->format('Y-m-d'),
            'no_serdos' => $row[9] === 'null' ? null : $row[9],
            'pendidikan_terakhir' => $row[10] === 'null' ? null : $row[10],
            'jurusan_pendidikan_terakhir' => $row[11] === 'null' ? null : $row[11],
            'universitas_pendidikan_terakhir' =>    $row[12] === 'null' ? null : $row[12],
            'kelompok_keahlian' => $row[13] === 'null' ? null : $row[13],
            'prodi' => $row[14] === 'null' ? null : $row[14],
            'jenis_kelamin' => $row[15] === 'null' ? null : $row[15],
            'status_pegawai' => $row[16] === 'null' ? null : $row[16],
            'tanggal_masuk' => $row[17] === 'null' ? null : Carbon::parse($row[17])->format('Y-m-d'),
            'tempat_lahir' => $row[18] === 'null' ? null : $row[18],
            'tanggal_lahir' => $row[19] === 'null' ? null : Carbon::parse($row[19])->format('Y-m-d'),
            'email' => $row[20] === 'null' ? null : $row[20],
        ]);
    }
}
