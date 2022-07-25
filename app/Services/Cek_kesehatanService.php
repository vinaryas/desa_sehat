<?php

namespace App\Services;

use App\Models\Cek_kesehatan;

class Cek_kesehatanService
{
    private $Cek_kesehatan;

    public function __construct(Cek_kesehatan $Cek_kesehatan)
    {
        $this->Cek_kesehatan = $Cek_kesehatan;
    }

    public function all()
    {
        return $this->Cek_kesehatan->query();
    }

    public function store($data)
    {
        return $this->Cek_kesehatan->create($data);
    }

    public function getById($id)
    {
        return $this->Cek_kesehatan->where('id', $id);
    }
}
