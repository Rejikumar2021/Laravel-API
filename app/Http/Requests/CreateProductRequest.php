<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_name' => 'required|unique:products,product_name',
            'product_description' => 'required',
            'product_price' => 'required|decimal:2',
            'product_sale_price' => 'required|decimal:2',
            'product_category' => 'required',
            'product_available_quantity' => 'required',
            'sale_outof_stock' => 'required'
        ];
    }
}
