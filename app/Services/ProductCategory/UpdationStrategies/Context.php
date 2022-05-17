<?php

namespace App\Services\ProductCategory\UpdationStrategies;

use App\Models\ProductCategory;

class Context
{
    /**
     * @var \App\Services\ProductCategory\UpdationStrategies\UpdateStrategyInterface
     */
    private $updateStrategy;

    /**
     * Set the value of updateStrategy.
     *
     * @param \App\Services\ProductCategory\UpdationStrategies\UpdateStrategyInterface $updateStrategy
     * @return  void
     */
    public function setUpdateStrategy(UpdateStrategyInterface $updateStrategy): void
    {
        $this->updateStrategy = $updateStrategy;
    }

    /**
     * Update product category.
     *
     * @param array $productCategoryData
     * @param \App\Models\ProductCategory $productCategory
     * @return ProductCategory
     */
    public function updateProductCategory(array $productCategoryData, ProductCategory $productCategory): ProductCategory
    {
        $productCategory = $this->updateStrategy->update($productCategoryData, $productCategory);
        return $productCategory;
    }
}
