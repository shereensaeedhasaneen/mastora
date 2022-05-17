<?php

namespace App\Services\FieldInquiry\CreationStrategies;

use App\Models\FieldInquiry;

class Context
{
    /**
     * @var \App\Services\FieldInquiry\CreationStrategies\CreateStrategyInterface
     */
    private $createStrategy;

    /**
     * Set the value of createStrategy.
     *
     * @param \App\Services\FieldInquiry\CreationStrategies\CreateStrategyInterface $createStrategy
     * @return  void
     */
    public function setCreateStrategy(CreateStrategyInterface $createStrategy): void
    {
        $this->createStrategy = $createStrategy;
    }

    /**
     * Create Product category.
     *
     * @param array $fieldInquiryData
     * @return \App\Models\FieldInquiry
     */
    public function createFieldInquiry(array $fieldInquiryData): FieldInquiry
    {
        $fieldInquiry = $this->createStrategy
            ->create($fieldInquiryData);
        return $fieldInquiry;
    }
}
