<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeInvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'customer' => 'required',
            'date' => 'required',
            'due_date' => 'required',
            'numero' => 'required',
            'reference' => 'required',
            'items' => 'required',
            'terms' => 'required',
        ];
    }
}
