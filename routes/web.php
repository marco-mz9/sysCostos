<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\TaxController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');

    Route::resource('taxes', TaxController::class);

    Route::resource('purchases', PurchaseController::class)->only(['index', 'store', 'create']);

    Route::resource('sales', SaleController::class)->except(['edit', 'destroy', 'update']);
    Route::get('order', [SaleController::class, 'orderP'])->name('sales.order');
    Route::get('/api/fetch-products/{id}/products', [SaleController::class, 'fetchProduct']);

    Route::get('sales/{sale}/pdf', [SaleController::class, 'pdfOrder'])->name('sales.pdfOrder');

    Route::get('reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('reports/date', [ReportController::class, 'reportSale'])->name('reports.sale');
});

require __DIR__ . '/auth.php';
