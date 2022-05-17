<?php
namespace App\Services\ProductCategory\CreationStrategies;

use App\Models\ProductCategory;

interface CreateStrategyInterface
{
    /**
     * Create ProductCategory contract.
     *
     * @param array $productCategoryData
     * @return \App\Models\ProductCategory
     */
    public function create(array $productCategoryData): ProductCategory;
}