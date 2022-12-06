<?php

namespace App\Exports;

use App\Models\Purchase_Detail;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class ReportsExport implements FromView
{
    public function view(): View
    {
        return view('exports.invoices', [
            'invoices' => Purchase_Detail::all()
        ]);
    }
}
