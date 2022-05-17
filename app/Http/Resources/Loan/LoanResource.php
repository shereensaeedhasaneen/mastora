<?php

namespace App\Http\Resources\Loan;

use Illuminate\Http\Resources\Json\JsonResource;

class LoanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //dd($this->relative , $this->illnesses , $this->socialReacerch , $this->costs);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'bank_branch_id' => $this->bank->name,
            'national_id' => $this->national_id,
            'loan_uniqe_id' => $this->loan_uniqe_id,
            'type' => $this->customizeType($this->type),
            'price' => $this->price,
            'payment_period' => $this->payment_period,
            'depit_value' => $this->depit_value,
            'phone_number' => $this->phone_number,
            'land_line_number' => $this->land_line_number,
            'number_of_insurance' => $this->number_of_insurance,
            'date_of_birth' => $this->date_of_birth,
            'social_status' => $this->social_status,
            'status' => $this->status,
            'number_of_children' => $this->number_of_children,
            'description' => $this->description,
            'have_experince' => $this->have_experince,
            'number_of_experice_years' => $this->number_of_experice_years ,
            'is_owner_project' => $this->is_owner_project ?? true,
            'address_project' => $this->address_project ?? "ا يوجد",
            'applicant_address' => $this->applicant_address ?? "ا يوجد",
            'real_address' => $this->real_address ?? "لا يوجد",
            'is_draft' => $this->is_draft,
            //'illness' => new RelativeResource($this->relative),
        ];
    }

    public function customizeType($type)
    {
        switch ($type) {
            case 1:
                return " متجددة";
                break;
            case 2:
                return " صناعي";
                break;
            case 3:
                return " زراعي";
                break;
            case 4:
                return " منزلي";
                break;
            case 5:
                return " خدمات";
                break;
            case 6:
                return " تجاري";
                break;
        }
        return "";
    }
}
