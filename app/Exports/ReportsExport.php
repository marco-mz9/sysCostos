<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

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

}
