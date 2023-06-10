<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Detail;
use App\Models\Order;
use App\Models\Product;
use App\Models\Sale;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\CreateOrderRequest;

class OrderController extends Controller
{
    public function index(): View
    {
        $orders = Order::with('products', 'client', 'sale')->paginate(10);
        return view('orders.index', compact('orders'));
    }

    public function create(): View
    {
        $details = Detail::all();
        $sales = Sale::all();
        return view('orders.create', compact('details', 'sales'));
    }

    /**
     * @throws ValidationException
     */
    public function store(CreateOrderRequest $request): RedirectResponse
    {
        $data = $request->except('products');
        $data['state'] = 1;
        $cliente = Client::create($data);
        $sale = Sale::find($data['sale']);
        $data['client_id'] = $cliente->id;
        $data['sale_id'] = $sale->id;

        foreach ($request->products as $value) {
            $order = Order::create($data);
            $value['state'] = 1;
            $product = Product::create($value);
            $value['total_price'] = $value['quantity'] * $value['price'];
            $order->products()->attach($product->id, ['quantity' => $value['quantity'], 'total_price' => $value['total_price']]);
        }
        return redirect()->route('orders.index')->with('success', 'Ordenes Creadas Correctamente');
    }

    public function show($id): View
    {
        $orders = Order::with('products')->findOrFail($id);
        return view('orders.show', compact('orders'));
    }

    public function pdfOrder($id): Response
    {
        $orders = Order::with('products')->findOrFail($id);
        return PDF::loadView('orders.pdfShow', compact('orders'))->download('order.pdf');
    }
}
