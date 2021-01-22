<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithProperties;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TimesheetsExport implements FromCollection, WithColumnWidths, WithProperties, WithHeadings, WithStyles
{
    protected $data;

    public function __construct($data) {
        $this->data = $data;
    }

    public function columnWidths(): array {
        return [
            'A' => 13,
            'B' => 18,
            'C' => 18,
            'D' => 18,
            'E' => 23,
            'F' => 18,
            'G' => 23,
            'H' => 18,
            'I' => 18,
        ];
    }

    public function properties(): array
    {
        return [
            'creator'        => 'Arnas Montrimas',
            'title'          => 'Report Export',
        ];
    }

    public function headings(): array
    {
        return [
            'Product ID',
            'Product Name',
            'Product Category',
            'Employee ID',
            'Estimated Build Time',
            'Actual Build Time',
            'Product Selling Price',
            'Cost To Build',
            'Net Profit',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $highestRow = $sheet->getHighestDataRow();

        $sheet->getStyle('A1:'.'A'.$highestRow)->getAlignment()->setHorizontal('center');
        $sheet->getStyle('B1')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('C1')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('D1:'.'D'.$highestRow)->getAlignment()->setHorizontal('center');
        $sheet->getStyle('E1:'.'E'.$highestRow)->getAlignment()->setHorizontal('center');
        $sheet->getStyle('F1:'.'F'.$highestRow)->getAlignment()->setHorizontal('center');
        $sheet->getStyle('G1:'.'G'.$highestRow)->getAlignment()->setHorizontal('center');
        $sheet->getStyle('H1:'.'H'.$highestRow)->getAlignment()->setHorizontal('center');
        $sheet->getStyle('I1:'.'I'.$highestRow)->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A1')->getFont()->setBold(true);
        $sheet->getStyle('B1')->getFont()->setBold(true);
        $sheet->getStyle('C1')->getFont()->setBold(true);
        $sheet->getStyle('D1')->getFont()->setBold(true);
        $sheet->getStyle('E1')->getFont()->setBold(true);
        $sheet->getStyle('F1')->getFont()->setBold(true);
        $sheet->getStyle('G1')->getFont()->setBold(true);
        $sheet->getStyle('H1')->getFont()->setBold(true);
        $sheet->getStyle('I1')->getFont()->setBold(true);

    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect($this->data);
    }
}
