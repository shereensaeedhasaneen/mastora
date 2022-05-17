<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoanDataRequest extends FormRequest
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
            // 'name' => 'required',
            // 'national_id' => 'required',
            // 'loan_uniqe_id' => 'required',
            // 'type' => 'required',
            // 'price' => 'required',
            // 'payment_period' => 'required',
            // 'number_of_installments' => 'required',
            // 'depit_value' => 'required',
            // 'phone_number' => 'required',
            // 'land_line_number' => 'required',
            // 'number_of_insurance' => 'required',
            // 'date_of_birth' => 'required',
            // 'social_status' => 'required',
            // 'number_of_children' => 'required',
            // 'have_special_case' => 'required',
            // 'description' => 'required',
            // 'have_experince' => 'required',
            // 'number_of_experice_years' => 'required',
            // 'is_owner_project' => 'required',
            // 'address_project' => 'required',
            // 'guarantor_type' => 'required',
            // 'creator_id' => 'required',
            // 'last_updater_id' => 'required',
            // 'bank_branch_id' => 'required',
            // 'country_id' => 'required',
            // 'user_id' => 'required',
            // 'national_id_file' => 'required',
            // 'home_service_file' => 'required',
            // 'rent_file' => 'required',
            // 'partner_file' => 'required',
            // 'price_file' => 'required',
        ];
    }
}
