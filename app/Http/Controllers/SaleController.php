<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SaleController extends Controller
{
    public function index(): View
    {
        $sales = Sale::all();
        return view('sales.index', compact('sales'));
    }

    public function create(): View
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
