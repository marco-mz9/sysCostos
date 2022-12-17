<?php

namespace App\Http\Controllers;

use App\Exports\ReportsExport;
use App\Models\Classification;
use App\Models\Order;
use App\Models\Purchase_Detail;
use App\Models\Sale;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function index(): Factory|View|Application
    {
        $classification = Classification::get();
        return view('reports.index', compact('classification'));
    }

    public function reportSale(Request $request)
    {
        $this->validate($request, [
            'date_start' => 'required|date_format:Y-m-d',
            'date_end' => 'required|date_format:Y-m-d',
            'select_class' => 'required',
        ]);

        $dateStart = $request->date_start;
        $dateEnd = $request->date_end;

        $reports['report'] = Purchase_Detail::with('purchase.supplier', 'tax', 'detail', 'detail.classification')
            ->whereHas('purchase', function ($query) use ($dateStart, $dateEnd) {
                $query->whereBetween('date', [$dateStart, $dateEnd]);
            })->whereRelation('detail.classification', 'name', 'like', $request->select_class)->get();

        $reports['sum_reports'] = $reports['report']->sum('total');
        switch ($request->input('action')) {
            case 'save':
                return view('reports.report', compact('reports'));
            case 'excel':
                return Excel::download(new ReportsExport($reports), 'report.xlsx');
        }
    }

    public function orderP(): Factory|View|Application
    {
        $ord = Sale::all();
        return view('reports.order', compact('ord'));
    }

    public function fetchProduct($id): Model|Collection|Builder|array|null
    {
        return Order::with('products', 'purchase.details.detail.classification', 'client', 'sale')->findOrFail($id);
    }
}
