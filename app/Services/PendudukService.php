<?php

namespace App\Services;


use App\Models\Penduduk;

class PendudukService
{
    private $Penduduk;

    public function __construct(Penduduk $Penduduk)
    {
        $this->Penduduk = $Penduduk;
    }

    public function all()
    {
        return $this->Penduduk->query();
    }
}
