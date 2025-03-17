<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'title'=>'required|string',
            'price'=>'required|numeric|min:0',
            'decounted_price'=>'nullable|numeric|min:0',
            'reference'=>'required|string|unique:products,reference',
            'description'=>'required|string',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'qte'=>'required|integer|min:0',
            'id_sub_catg'=>'required|integer|exists:sub_categories,id',
            'in_stock'=>'required',
        ];
    }
}
