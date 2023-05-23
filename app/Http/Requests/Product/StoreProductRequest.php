<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class StoreProductRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape([])] public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|max:10000',
            'price' => 'required|float',
            'quantity' => 'required|integer',
        ];
    }
}
