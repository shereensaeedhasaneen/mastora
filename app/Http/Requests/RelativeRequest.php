<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class RelativeRequest extends FormRequest
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
            "family_info.*.name"=> "required",
            "family_info.*.national_id"=> "required",
            "family_info.*.dateOfBirth"=> "required",
            "family_info.*.social_status"=> "nullable",
            "family_info.*.eduction_status"=> "nullable",
            "family_info.*.job"=> "nullable",
            "family_info.*.income"=> "required",
            "family_info.*.type"=> "nullable",
        ];
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
