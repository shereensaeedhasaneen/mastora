<?php

namespace App\Services\ProductCategory\CreationStrategies;

use App\Models\ProductCategory;

class Context
{
    /**
     * @var \App\Services\ProductCategory\CreationStrategies\CreateStrategyInterface
     */
    private $createStrategy;

    /**
     * Set the value of createStrategy.
     *
     * @param \App\Services\ProductCategory\CreationStrategies\CreateStrategyInterface $createStrategy
     * @return  void
     */
    public function setCreateStrategy(CreateStrategyInterface $createStrategy): void
    {
        $this->createStrategy = $createStrategy;
    }

    /**
     * Create Product category.
     *
     * @param array $productCategoryData
     * @return \App\Models\ProductCategory
     */
    public function createProductCategory(array $productCategoryData): ProductCategory
    {
        $productCategory = $this->createStrategy
            ->create($productCategoryData);
        return $productCategory;
    }
}
