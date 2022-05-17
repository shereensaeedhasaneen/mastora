<?php

namespace App\Services\FieldInquiry\CreationStrategies;

use App\Models\FieldInquiry;
use App\Services\FieldInquiryService;

class WebBasedStrategy implements CreateStrategyInterface
{

    /**
     * Implementing the creation of a product category.
     *
     * @param array $fieldInquiryData
     * @return \App\Models\FieldInquiry
     */
    public function create(array $fieldInquiryData): FieldInquiry
    {

        $fieldInquiryService = resolve(FieldInquiryService::class);

        $fieldInquiry = $fieldInquiryService->makeResource($fieldInquiryData);
        
       
        return $fieldInquiry;
    }

}
