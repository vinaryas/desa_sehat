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

	public function find($nik)
	{
		return $this->all()->where('id', $nik);
	}

	public function select($data)
	{
		$model = $this->Penduduk;

		$model = $model->query();

		$model = $model->where('id', 'like', '%' . $data->input('input') . '%')
						->orWhere('nama', 'like', '%' . $data->input('input') . '%')->limit(50);

		return $model;
	}
}
