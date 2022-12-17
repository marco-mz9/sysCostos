<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\TaxController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');

    Route::resource('taxes', TaxController::class);
    Route::resource('purchases', PurchaseController::class)->only(['index', 'store', 'create']);

    Route::resource('sales', SaleController::class)->only(['index', 'store', 'create']);


    Route::resource('orders', OrderController::class)->except(['edit', 'destroy', 'update']);
    Route::get('orders/{order}/pdf', [OrderController::class, 'pdfOrder'])->name('orders.pdfOrder');

    Route::get('reportsOrder', [ReportController::class, 'orderP'])->name('report.order');
    Route::get('/api/fetch-products/{id}/products', [ReportController::class, 'fetchProduct']);
//    Route::get('excelOrder', [ReportController::class, 'exportExcelO'])->name('reports.excel2');
    Route::get('reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('reports/date', [ReportController::class, 'reportSale'])->name('reports.sale');
    Route::get('excel', [ReportController::class, 'exportExcel'])->name('reports.excel');

});

require __DIR__ . '/auth.php';
