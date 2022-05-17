<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class FieldInquiryRequest extends FormRequest
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
            "field_inquiry.reputation" => "required", 
            "field_inquiry.permanent" => "required", 
            "field_inquiry.project_description" => "required", 
            "field_inquiry.project_type" => "required", 
            "field_inquiry.project_cost" => "required", 
            "field_inquiry.project_revenue" => "required", 
            "field_inquiry.project_period" => "required", 
            "field_inquiry.home_description" => "required", 
            "field_inquiry.is_owner" => "required", 
            "field_inquiry.rent" => "numeric", 
        ];
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
