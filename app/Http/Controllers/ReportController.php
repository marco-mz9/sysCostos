<?php

namespace App\Http\Controllers;

use App\Exports\ReportsExport;
use App\Models\Classification;
use App\Models\Order;
use App\Models\Purchase_Detail;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\ReportSaleRequest;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ReportController extends Controller
{
    //Report of sales
    public function index(): View
    {
        $classification = Classification::all();
        return view('reports.index', compact('classification'));
    }

    public function reportSale(ReportSaleRequest $request): Application|Factory|View|BinaryFileResponse
    {
        $dateStart = $request->date_start;
        $dateEnd = $request->date_end;
        $selectClass = $request->select_class;

        $reports['purchaseDetails'] = Purchase_Detail::with('purchase.supplier', 'tax', 'detail', 'detail.classification')
            ->whereHas('purchase', function ($query) use ($dateStart, $dateEnd) {
                $query->whereBetween('date', [$dateStart, $dateEnd]);
            })->whereRelation('detail.classification', 'name', 'like', $selectClass)->get();

        $reports['sumReports'] = $reports['purchaseDetails']->sum('total');

        return match ($request->input('action')) {
            'save' => view('reports.report', compact('reports')),
            'excel' => Excel::download(new ReportsExport($reports), 'report.xlsx')
        };
    }

    //Report of orders
    public function orderP(): View
    {
        $orders = Order::all();
        return view('reports.order', compact('orders'));
    }

    public function fetchProduct($id): Model|Collection|Builder|array|null
    {
        return Order::with('products:id,product,price', 'purchase.details.detail.classification', 'client', 'sale')->findOrFail($id);
    }

}
