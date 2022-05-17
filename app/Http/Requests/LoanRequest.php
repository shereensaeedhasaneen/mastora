<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoanRequest extends FormRequest
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
        switch($this->index){
            case 0 :
                return [
                    "name" => "required",
                    "national_id" => "required|numeric|digits:14",
                    "country_id" => "required|numeric",
                    "bank_branch_id" => "required|numeric",
                ];
            case 1 :
                return [
                    "user_partner_name.*" => "required",
                    "user_partner_nationlid.*" => "required|distinct",
                ];
            case 2 :
                return [
                    "type" => "required",
                    "price" => "required|numeric|min:4000|max:30000",
                    "payment_period" => "required|numeric",
                ];
            case 33 :
                return [
                    "phone_number" => "required|numeric|digits:11",
                    "date_of_birth" => "required|date|before:21 years ago",
                    'land_line_number' => 'nullable|numeric|digits:8',
                    "number_of_insurance" => "nullable|numeric|digits:8",
                    "number_of_children" => "numeric",
                    "applicant_address" => "required",
                    "applicant_city" => "required",
                    "applicant_country" => "required",
                ];
            case 3 :
                return [
                    "description" => "required",
                    "address_project" => "required",
                    "applicant_address" => "required",
                    "address_project_city" => "required",
                    "address_project_country" => "required",
                ];
            case 4 :
                return [
                    'guarantor_' . $this->guarantor . '_1' => "required",
                    'guarantor_' . $this->guarantor . '_2' => "required_unless:guarantor,organization",
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
                    "national_id.required" => "برجاء إدخال الرقم القومى",
                    "national_id.digits" => "الرقم القومى يجب ان يحنوى على 14 رقم",
                    "country_id.required" => "برجاء إدخال المحافظة ",
                    "bank_branch_id.required" => "برجاء إدخال فرع البنك ",
                ];
            case 1 :
                return [
                    "user_partner_name.required" => "برجاء إدخال كل البيانات",
                    "user_partner_nationlid.required" => "برجاء إدخال كل البينات ",
                ];
            case 2 :
                return [
                    "type.required" => "برجاء إدخال نوع القرض",
                    "price.required" => "برجاء إدخال مبلغ القرض",
                    "price.min" => "مبلغ القرض اقل من 4000 ",
                    "price.max" => "مبلغ القرض اكبر من 30000 ",
                    "payment_period.required" => "برجاء إدخال مده القرض",
                ];
                case 33 :
                    return [
                        "phone_number.required" => "برجاء إدخال رقم الهاتف",
                        "phone_number.digits" => "رقم الهاتف يجب ان يحنوى على 11 رقم",
                        "land_line_number.digits" => "رقم الهاتف الارضى يجب ان يحنوى على 8 ارقام",
                        "date_of_birth.required" => "برجاء إدخال تاريخ الميلاد",
                        "date_of_birth.before" => "تاريخ الميلاد غير صالح",
                        "number_of_insurance.numeric" => "برجاء إدخال الرقم التامينى",
                        "number_of_insurance.digits" => "برجاء إدخال رقم تامينى صالح",
                        "number_of_children.numeric" => "برجاء إدخال الاسم",
                        "applicant_address.required" => "برجاء إدخال العنوان ",
                        "applicant_city.required" => "برجاء إدخال  المنطقة",
                        "applicant_country.required" => "برجاء إدخال المدينة ",
                    ];
                case 3 :
                    return [
                        "description.required" => "برجاء إدخال وصف المشروع",
                        "address_project.required" => "برجاء إدخال مكان المشروع",
                    ];
                case 4: 
                    return [
                        'guarantor_' . $this->guarantor . '_1.required' => "برجاء إدخال هذا الحقل",
                        'guarantor_' . $this->guarantor . '_2.required' => "برجاء إدخال هذا الحقل",

                    ];    
            default : 
                return [];

        }
    }
}
