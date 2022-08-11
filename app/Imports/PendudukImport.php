<?php

namespace App\Imports;

use App\Models\Penduduk;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PendudukImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Penduduk([
            'id' => $row['nik'],
            'alamat' => $row['alamat'],
            'dusun' => $row['dusun'],
            'rw' => $row['rw'],
            'rt' => $row['rt'],
            'nama' => $row['nama'],
            'no_kk' => $row['no_kk'],
            'nik' => $row['nik'],
            'tanggal_lahir' => $row['tanggallahir'],
        ]);
    }
}
