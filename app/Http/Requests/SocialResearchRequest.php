<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class SocialResearchRequest extends FormRequest
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
            "social_research.is_owner"=> "required",
            "social_research.number_of_rooms"=> "required",
            "social_research.is_shared_bathroom"=> "required",
            "social_research.houes_status"=> "required",
            "social_research.furniture_status"=> "required",
            "social_research.house_needs"=> "required",
            "social_research.furniture_description"=> "required",
            "social_research.notes"=> "nullable",
        ];
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
