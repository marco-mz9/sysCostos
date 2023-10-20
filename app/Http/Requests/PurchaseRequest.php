<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
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
        ];
    }
}
