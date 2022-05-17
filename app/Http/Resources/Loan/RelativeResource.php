<?php

namespace App\Http\Resources\Loan;

use Illuminate\Http\Resources\Json\JsonResource;

class RelativeResource extends JsonResource
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
            "name" => $this->name,
            "dateOfBirth" => $this->dateOfBirth,
            "social_status" => $this->social_status,
            "national_id" => $this->national_id,
            "eduction_status" => $this->eduction_status,
            "job" => $this->job,
            "income" => $this->income,
            "type" => $this->type,
            "in_home" => $this->in_home,
            "description" => $this->description,
        
        ];
    }
}
