<?php

namespace App\Http\Controllers;

use App\Models\Classification;
use App\Models\Purchase_Detail;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(): Factory|View|Application
    {
        $classification = Classification::get();
        return view('reports.index', compact('classification'));
    }

    public function reportSale(Request $request): Factory|View|Application
    {
        $dateStart = $request->input('date_start');
        $dateEnd = $request->input('date_end');
        $class = $request->input('select_class');
        $reports = Purchase_Detail::with('purchase.supplier', 'tax', 'detail', 'detail.classification')
            ->whereHas('purchase', function ($query) use ($dateStart, $dateEnd) {
                $query->whereBetween('date', [$dateStart, $dateEnd]);
            })->whereRelation('detail.classification', 'name', 'like', $class)->get();
        return view('reports.report', compact('reports'));
    }

}
