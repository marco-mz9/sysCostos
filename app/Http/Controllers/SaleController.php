<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Detail;
use App\Models\Order;
use App\Models\Product;
use App\Models\Sale;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class SaleController extends Controller
{
    public function index(): Factory|View|Application
    {
        $sales = Sale::all();
        return view('sales.index', compact('sales'));
    }

    public function create(): Factory|View|Application
    {
        return view('sales.create');
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $this->validate($request, [
            'description' => 'required',
        ]);
        $sale = Sale::create($data);
//        notify()->success('Creado Correctamente ⚡️','Pedido '.$sale->id);
        return redirect()->route('sales.index')->with('success', 'Pedido Creado Correctamente');
    }
}
