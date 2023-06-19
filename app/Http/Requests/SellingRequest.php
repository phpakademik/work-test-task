<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellingRequest extends FormRequest
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
            'storage_id'=>'required|integer',
            'client_id'=>'required|integer',
            'count'=>'required|integer',
            'price'=>'required|integer'
        ];
    }
}
