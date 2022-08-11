<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cek_kesehatan extends Model
{
    use HasFactory;

    protected $table = 'cek_kesehatan';
    protected $guarded = [];

	public function penduduk()
	{
		return $this->hasOne(Penduduk::class, 'id', 'nik');
	}

	
}
