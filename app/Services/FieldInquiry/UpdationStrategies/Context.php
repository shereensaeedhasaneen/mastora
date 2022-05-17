<?php

namespace App\Services\FieldInquiry\UpdationStrategies;

use App\Models\FieldInquiry;

class Context
{
    /**
     * @var \App\Services\FieldInquiry\UpdationStrategies\UpdateStrategyInterface
     */
    private $updateStrategy;

    /**
     * Set the value of updateStrategy.
     *
     * @param \App\Services\FieldInquiry\UpdationStrategies\UpdateStrategyInterface $updateStrategy
     * @return  void
     */
    public function setUpdateStrategy(UpdateStrategyInterface $updateStrategy): void
    {
        $this->updateStrategy = $updateStrategy;
    }

    /**
     * Update product category.
     *
     * @param array $fieldInquiryData
     * @param \App\Models\FieldInquiry $fieldInquiry
     * @return FieldInquiry
     */
    public function updateFieldInquiry(array $fieldInquiryData, FieldInquiry $fieldInquiry): FieldInquiry
    {
        $fieldInquiry = $this->updateStrategy->update($fieldInquiryData, $fieldInquiry);
        return $fieldInquiry;
    }
}
