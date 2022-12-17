<?php

namespace App\Exports;

use App\Models\Purchase_Detail;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;


class ReportsExport implements FromView
{

    private $reports;

    public function __construct($reports)
    {
        $this->reports = $reports;
    }

    /**
     * @return View
     */
    public function view(): View
    {
        return view('reports.excel', ['reports' => $this->reports]);
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getDelegate()->setRightToLeft(true);
            },
        ];
    }
}
