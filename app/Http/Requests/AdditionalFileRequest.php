<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdditionalFileRequest extends FormRequest
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
            "national_id_front_file" => "required",
            "national_id_end_file" => "required",
            "home_service_file" => "required",
            "rent_file" => "required",
            "price_file" => "required",
            "partner_file" => "required",
        ];
    }

    public function messages()
    {
        return [
            "national_id_file_front.required" => "هذا الحقل الزامى",
            "national_id_file_end.required" => "هذا الحقل الزامى",
            "home_service_file.required" => "هذا الحقل الزامى",
            "rent_file.required" => "هذا الحقل الزامى",
            "price_file.required" => "هذا الحقل الزامى",
            "partner_file.required" => "هذا الحقل الزامى",
        ];
    }
}
