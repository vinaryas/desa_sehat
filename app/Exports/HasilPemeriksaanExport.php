<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class HasilPemeriksaanExport extends ExcelExport implements FromView
{
    use Exportable;

	private $data;

	public function __construct($data)
	{
		$this->data = $data;
	}

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('Form.excel', [
            'forms' => $this->data
        ]);
    }
}
