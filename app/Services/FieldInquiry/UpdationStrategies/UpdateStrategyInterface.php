<?php

namespace App\Services\FieldInquiry\UpdationStrategies;

use App\Models\FieldInquiry;

interface UpdateStrategyInterface
{
    /**
     * Update Product Category contract.
     *
     * @param array $fieldInquiryData
     * @param \App\Models\FieldInquiry $fieldInquiry
     * @return \App\Models\FieldInquiry
     */
    public function update(array $fieldInquiryData, FieldInquiry $fieldInquiry): FieldInquiry;
}
