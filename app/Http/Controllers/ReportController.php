<?php

namespace App\Http\Controllers;

use App\Exports\ReportsExport;
use App\Models\Classification;
use App\Models\Order;
use App\Models\Purchase_Detail;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\ReportSaleRequest;

class ReportController extends Controller
{
    //Report of sales
    public function index(): View
    {
        $classification = Classification::get();
        return view('reports.index', compact('classification'));
    }

    public function reportSale(ReportSaleRequest $request)
    {
        $dateStart = $request->date_start;
        $dateEnd = $request->date_end;

        $reports['purchaseDetails'] = Purchase_Detail::with('purchase.supplier', 'tax', 'detail', 'detail.classification')
            ->whereHas('purchase', function ($query) use ($dateStart, $dateEnd) {
                $query->whereBetween('date', [$dateStart, $dateEnd]);
            })->whereRelation('detail.classification', 'name', 'like', $request->select_class)->get();

        $reports['sumReports'] = $reports['purchaseDetails']->sum('total');

        switch ($request->input('action')) {
            case 'save':
                return view('reports.report', compact('reports'));
            case 'excel':
                return Excel::download(new ReportsExport($reports), 'report.xlsx');
        }
    }

    //Report of orders
    public function orderP(): View
    {
        $orders = Order::all();
        return view('reports.order', compact('orders'));
    }

    public function fetchProduct($id): Model|Collection|Builder|array|null
    {
        return Order::with('products', 'purchase.details.detail.classification', 'client', 'sale')->findOrFail($id);
    }

}
