<?php

namespace App\Http\Controllers;

use App\Models\Tax;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TaxController extends Controller
{
    public function index(): Factory|View|Application
    {
        $taxes = Tax::paginate(6);
        return view('taxes.index', compact('taxes'));
    }

    public function create(): Factory|View|Application
    {
        return view('taxes.create');
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $this->validate($request, [
            'name' => 'required|max:100',

        ]);
        $data['state'] = 1;
        Tax::create($data);

        return redirect()->route('taxes.index')->with('status', 'IVA Creado Correctamente');
    }

    public function edit($id): Factory|View|Application
    {
        $tax = Tax::find($id);
        return view('taxes.edit', compact('tax'));
    }

    /**
     * @throws ValidationException
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $input = $request->all();
        $tax = Tax::find($id);
        $tax->update($input);
        return redirect()->route('taxes.index');
    }

    public function destroy(Tax $tax): RedirectResponse
    {
        $tax->delete();
        return redirect()->route('taxes.index')->with('status', 'IVA Correctamente Eliminado');
    }

}
