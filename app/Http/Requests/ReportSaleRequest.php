<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportSaleRequest extends FormRequest
{

    public mixed $date_start;
    public mixed $date_end;
    public mixed $select_class;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'date_start' => 'required|date_format:Y-m-d',
            'date_end' => 'required|date_format:Y-m-d',
            'select_class' => 'required',
        ];
    }
}
