<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'ruc' => 'required|string|max:13',
            'date_start' => 'required|date_format:Y-m-d',
            'date_end' => 'required|date_format:Y-m-d',
            'sale' => 'required',
            'products.*.product' => 'required|string|max:150',
            'products.*.price' => 'required',
            'products.*.quantity' => 'required|numeric',
        ];
    }
}
