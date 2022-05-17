<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartnerRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            "name" => "required", 
            "active" => "required|numeric", 
            "email" => "required", 
            "bank_branch_id" => "required|numeric|min:1", 
        ];
        
    }

    public function messages()
    {
        return [
        ];
    }
}
