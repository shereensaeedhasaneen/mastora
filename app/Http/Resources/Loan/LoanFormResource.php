<?php

namespace App\Http\Resources\Loan;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class LoanFormResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {    
        return [
            'id' => $this->id,
            'name' => $this->name,
            'national_id' => $this->national_id,
            'loan_uniqe_id' => $this->loan_uniqe_id,
            'type' => $this->loanType( $this->type),
            'price' => $this->price,
            'payment_period' => $this->payment_period . "سنة",
            'receipt_number'=> $this->receipt_number,
            'depit_value'=> intval($this->depit_value),
            'phone_number' => $this->phone_number ,
            'land_line_number' => $this->land_line_number ??"" ,
            'number_of_insurance' => $this->number_of_insurance ?? "",
            'date_of_birth' => $this->formatDate( $this->date_of_birth ),
            'social_status' => $this->socialType( $this->social_status ) ,
            'number_of_children' => $this->number_of_children ,
            'description' => $this->description ,
            'have_experince' => $this->have_experince ? "يوجد" :"لا يوجد",
            'have_special_case' => $this->have_special_case ? "يوجد" :"لا يوجد",
            'number_of_experice_years' => $this->number_of_experice_years ?? 0,
            'is_owner_project'=> $this->is_owner_project ? "يوجد" :"لا يوجد" ,
            'address_project'=> $this->address_project ,
            'guarantor_type' => $this->guarantor_type ,
            'is_draft' => $this->is_draft,
        ];
    }

    private function formatDate($date)
    {
        //dd($date);
        if (isset($date)) {
            return date('d-m-Y', strtotime($date));
            
        }
    }

    private function socialType($social_status)
    {
        switch($social_status){
            case 0 :
                return "متزوجة" ;
            
            case 1:
                return "مطلقة" ; 
            
            case 2:
                return "ارملة" ; 
            
            case 3:
                  return "عزباء" ;
            

        }
    }
    
    private function loanType($type)
    {
        switch($type){
            case 1 :
                return "طاقة متجددة" ;
            
            case 2:
                return "قرض صناعي" ; 
            
            case 3:
                return "قرض زراعي" ; 
            
            case 4:
                  return "قرض منزلي" ;
            
            case 5:
                  return "قرض خدمات" ;
            
            case 6:
                  return "قرض تجاري" ;
            

        }
    }
}
