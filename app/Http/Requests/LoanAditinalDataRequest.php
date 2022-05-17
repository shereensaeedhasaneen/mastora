<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoanAditinalDataRequest extends FormRequest
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
            "loan_id" => "required",
            // "social_research.is_owner"=> "required",
            // "social_research.number_of_rooms"=> "required",
            // "social_research.is_shared_bathroom"=> "required",
            // "social_research.houes_status"=> "required",
            // "social_research.furniture_status"=> "required",
            // "social_research.house_needs"=> "required",
            // "social_research.furniture_description"=> "required",
            // "social_research.notes"=> "required",
            // "family_info.*.name"=> "required",
            // "family_info.*.national_id"=> "required",
            // "family_info.*.dateOfBirth"=> "required",
            // "family_info.*.social_status"=> "required",
            // "family_info.*.eduction_status"=> "required",
            // "family_info.*.job"=> "required",
            // "family_info.*.income"=> "required",
            // "family_info.*.type"=> "required",
            // "illness.*.name" => "required",
            // "illness.*.type" => "required",
            // "illness.*.drugs" => "required",
            // "illness.*.notes" => "required",
            // "family_experince" => "required",
            "investment_costs.*.name" => "required",
            "investment_costs.*.price" => "required",
            "investment_costs.*.quantity" => "required", 
            "monthly_costs.*.name" => "required",
            "monthly_costs.*.price" => "required",
            "monthly_costs.*.quantity" => "required", 
            "monthly_revenue.*.name" => "required",
            "monthly_revenue.*.price" => "required",
            "monthly_revenue.*.quantity" => "required",
            // "field_inquiry.reputation" => "required", 
            // "field_inquiry.permanent" => "required", 
            // "field_inquiry.project_description" => "required", 
            // "field_inquiry.project_type" => "required", 
            // "field_inquiry.project_cost" => "required", 
            // "field_inquiry.project_revenue" => "required", 
            // "field_inquiry.project_period" => "required", 
        ];
    }
}
