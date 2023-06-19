<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RefoundRequest extends FormRequest
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
            'type'=>'required|string',
            'client_id'=>'required|integer',
            'storage_id'=>'required|integer',
            'comment'=>'required|string',
            'count'=>'required|integer',
        ];
    }
}
