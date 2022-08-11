<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExcelExport implements ShouldAutoSize, WithStyles, WithEvents, WithChunkReading, WithBatchInserts
{
	private $barisBold = 1;

	public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }

	public function styles(Worksheet $sheet)
    {
        return [
            $this->barisBold    => ['font' => ['bold' => true]],
        ];
    }

	public function setBarisBold($baris)
	{
		$this->baris = $baris;
	}

	public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                // Apply array of styles to A1:G2 cell range
                $styleArray = [
                    'borders' => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                                'color' => ['rgb' => '000000'],
                            ]
                        ],
                    'horizontal'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical'     => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    'textRotation' => 0,
                    'wrapText'     => TRUE

                ];

                $event->sheet->getDelegate()->getStyle('A1:AZ1')->getAlignment()->applyFromArray($styleArray);
            },
        ];
    }
}
