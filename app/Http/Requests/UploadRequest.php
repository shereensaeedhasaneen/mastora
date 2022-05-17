<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UploadRequest extends FormRequest
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
            'national_id_front_file' => 'required',
            'national_id_end_file' => 'required',
            'home_service_file' => 'required',
            'rent_file' => 'required',
            'price_file' => 'required',
            'partner_file' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'national_id_front_file.required' => 'برجاء إدخال صورة الرقم القومى الخلفية' ,
            'national_id_end_file.required' => ' برجاء إدخال صورة الرقم القومى الخلفية',
            'home_service_file.required' => 'برجاء إدخال إيصال المرافق',
            'rent_file.required' => 'برجاء إدخال صورة العقد ',
            'price_file.required' => 'برجاء إدخال عرض الاسعار  ',
            'partner_file.required' => 'برجاء إدخال مستند ضمان القرض  ',
        ];
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
