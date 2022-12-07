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
        $orders = Order::with('products', 'client', 'sale')->paginate(6);
        return view('sales.index', compact('orders'));
    }

    public function create(): Factory|View|Application
    {
        $details = Detail::all();
        return view('sales.create', compact('details'));
    }

    public function orderP(): Factory|View|Application
    {
        $ord = Sale::all();
        return view('sales.order', compact('ord'));
    }

    public function fetchProduct($id): Model|Collection|Builder|array|null
    {
        return Order::with('products', 'client', 'sale')->findOrFail($id);
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'ruc' => 'required|max:13',
            'date_start' => 'required|date_format:Y-m-d',
            'date_end' => 'required|date_format:Y-m-d',
            'products.*.product' => 'required',
            'products.*.price' => 'required',
            'products.*.quantity' => 'required|numeric',
        ]);

        $data = $request->except('products');
        $data['state'] = 1;
        $cliente = Client::create($data);
        $sale = Sale::create();
        $data['client_id'] = $cliente->id;
        $data['sale_id'] = $sale->id;

        foreach ($request->products as $value) {
            $order = Order::create($data);
            $value['state'] = 1;
            $product = Product::create($value);
            $value['total_price'] = $value['quantity'] * $value['price'];
            $order->products()->attach($product->id, ['quantity' => $value['quantity'], 'total_price' => $value['total_price']]);
        }
        return redirect()->route('sales.index')->with('status', 'Ordenes Creadas Correctamente');
    }

    public function show($id): Factory|View|Application
    {
        $orders = Order::with('products')->findOrFail($id);
        return view('sales.show', compact('orders'));
    }

    public function pdfOrder($id): Response
    {
        $orders = Order::with('products')->findOrFail($id);
        return PDF::loadView('sales.pdfShow', compact('orders'))->download('sale.pdf');
    }
}
