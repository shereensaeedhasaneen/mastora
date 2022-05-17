<?php

namespace App\Services\ProductCategory\UpdationStrategies;

use App\Models\ProductCategory;

interface UpdateStrategyInterface
{
    /**
     * Update Product Category contract.
     *
     * @param array $productCategoryData
     * @param \App\Models\ProductCategory $productCategory
     * @return \App\Models\ProductCategory
     */
    public function update(array $productCategoryData, ProductCategory $productCategory): ProductCategory;
}
