<?php
namespace App\Services\FieldInquiry\CreationStrategies;

use App\Models\FieldInquiry;

interface CreateStrategyInterface
{
    /**
     * Create FieldInquiry contract.
     *
     * @param array $fieldInquiryData
     * @return \App\Models\FieldInquiry
     */
    public function create(array $fieldInquiryData): FieldInquiry;
}