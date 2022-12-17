<?php

namespace App\Http\Controllers;

use App\Models\Classification;
use App\Models\Detail;
use App\Models\Order;
use App\Models\Purchase;
use App\Models\Purchase_Detail;
use App\Models\Supplier;
use App\Models\Tax;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PurchaseController extends Controller
{
    public function index(): Factory|View|Application
    {
        $purchase_details = Purchase_Detail::with('purchase.supplier', 'tax', 'detail', 'detail.classification','purchase.order')->paginate(10);
        return view('shopping.index', compact('purchase_details'));
    }

    public function create(): Factory|View|Application
    {
        $orders = Order::get();
        $taxes = Tax::get();
        $classification = Classification::get();
        return view('shopping.create', compact('taxes', 'classification','orders'));
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'date' => 'required|date_format:Y-m-d',
            'ruc' => 'required|max:13',
            'authorization' => 'required|max:15',
            'name' => 'required|max:50',
            'order' => 'required',
            'details.*.detail' => 'required|max:255',
            'details.*.classification_id' => 'required',
            'details.*.quantity' => 'required|numeric|min:1',
            'details.*.unit_value' => 'required|min:1',
            'details.*.tax_id' => 'required',
        ]);

        $details = collect($request->details)->transform(function ($detail) {
            $detail['total_value'] = $detail['quantity'] * $detail['unit_value'];
            if ($detail['tax_id'] == 1) {
                $tax_value = (12 / 100);
                $detail['total'] = ($detail['total_value'] * ($tax_value)) + $detail['total_value'];
            } else if ($detail['tax_id'] == 2) {
                $tax_value = 0;
                $detail['total'] = ($detail['total_value'] * ($tax_value)) + $detail['total_value'];
            }
            $detal = Detail::firstOrNew(['detail' => $detail['detail']]);
            $detal->unit_value = $detail['unit_value'];
            $detal->classification_id = $detail['classification_id'];
            $detal->save();
            $detail['detail_id'] = $detal->id;
            return new Purchase_Detail($detail);
        });

        $data = $request->except('details');
        $data['state'] = 1;
        $supplier = Supplier::create($data);
        $order = Order::find($data['order']);
        $data['supplier_id'] = $supplier->id;
        $data['order_id'] = $order->id;
        $purchase = Purchase::create($data);
        $purchase->details()->saveMany($details);
        return redirect()->route('purchases.index')->with('status', 'Compra Creada Correctamente');
    }
}
