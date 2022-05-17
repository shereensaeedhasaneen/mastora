<?php

namespace App\Http\Requests;

//use Illuminate\Foundation\Http\FormRequest;

class FormRequest extends FormRequest
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
        if(!$this->index){
            return [];
        }
        switch($this->index){
            case 0 :
                return [
                    "name" => "required",
                    "national_id" => "required",
                    "country_id" => "required",
                    "bank_branch_id" => "required",
                ];
            case 1 :
                return [
                    "user_partner_name.*" => "required",
                    "user_partner_nationlid.*" => "required",
                ];
            case 2 :
                return [
                    "type" => "required",
                    "price" => "required|numeric|min:4000|max:30000",
                    "payment_period" => "required",
                ];
            case 33 :
                return [
                    "phone_number" => "required|numeric|min:11",
                    "date_of_birth" => "required|date|before:21 years ago",
                    "number_of_insurance" => "required|numeric",
                    "number_of_children" => "required|numeric",
                    // "applicant_address" => "required",
                    // "applicant_city" => "required",
                    // "applicant_area" => "required",
                ];
            case 3 :
                return [
                    "description" => "required",
                    //"project_address" => "required",
                ];
            

        }
        return [
        ];
        
    }

    public function messages()
    {
        
        switch($this->index){
            case 0 :
                return [
                    "name.required" => "برجاء إدخال الاسم",
                    "national_id.required" => "required"
                ];
            case 1 :
                return [
                    "user_partner_name.*" => "required",
                    "user_partner_nationlid.*" => "required",
                ];
            case 2 :
                return [
                    "type" => "required",
                    "price" => "required",
                    "payment_period" => "required",
                ];
            case 4 :
                return [
                    "type" => "required",
                    "price" => "required",
                    "payment_period" => "required",
                ];
            default : 
                return [];

        }
    }
}
