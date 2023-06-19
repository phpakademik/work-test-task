<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuyingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'batches_id'=>'required|integer',
            'product_id'=>'required|integer',
            'provider_id'=>'required|integer',
            'count'=>'required|integer',
            'price'=>'required|integer',
        ];
    }
}
