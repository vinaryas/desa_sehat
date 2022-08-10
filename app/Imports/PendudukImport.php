<?php

namespace App\Imports;

use App\Models\Penduduk;
use Maatwebsite\Excel\Concerns\ToModel;

class PendudukImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Penduduk([
            'alamat' => $row[1],
            'dusun' => $row[2],
            'rw' => $row[3],
            'rt' => $row[4],
            'nama' => $row[5],
            'no_kk' => $row[6],
            'nik' => $row[7],
        ]);
    }
}
