<?php

namespace App\Services\ProductCategory\UpdationStrategies;

use App\Models\ProductCategory;
use App\Services\ProductCategoryService;

class WebBasedStrategy implements UpdateStrategyInterface
{

    /**
     * Implementing the updation of a product category.
     *
     * @param array $productCategoryData
     * @param \App\Models\ProductCategory $productCategory
     * @return \App\Models\ProductCategory
     */
    public function update(array $productCategoryData, ProductCategory $productCategory): ProductCategory
    {
        $authenticatedUserId = auth()->id();
        $productCategoryData['last_updater_id'] = $authenticatedUserId;

        $productCategoryWithWrappedTranslation = fillingTranslation($productCategoryData);

        $productCategory = $this->updateProductCategory($productCategoryWithWrappedTranslation, $productCategory);


        return $productCategory;
    }

    /**
     * Update product category.
     *
     * @param array $productCategoryWithWrappedTranslation
     * @return \App\Models\ProductCategory
     */
    private function updateProductCategory(array $productCategoryWithWrappedTranslation, ProductCategory $productCategory): ProductCategory
    {
        $productCategoryService = resolve(ProductCategoryService::class);
        $translationCode = $productCategoryWithWrappedTranslation['translation_language'];
        if (!isDefaultLanguage($translationCode)) {
            return $this->updateProductCategoryTranslation($productCategoryWithWrappedTranslation, $productCategory);
        }
        $updatedProductCategory = $productCategoryService->updateResource($productCategoryWithWrappedTranslation, $productCategory);
        return $updatedProductCategory;
    }

    /**
     * Update a product category translations which is not the default ones.
     *
     * @param array $productCategoryWithWrappedTranslation
     * @param \App\Models\ProductCategory $productCategory
     * @return \App\Models\ProductCategory
     */
    private function updateProductCategoryTranslation(array $productCategoryWithWrappedTranslation, ProductCategory $productCategory): ProductCategory
    {
        $translationCode = $productCategoryWithWrappedTranslation['translation_language'];
        $translatableAttributes = $productCategoryWithWrappedTranslation['filling_translation'];
        foreach ($productCategory->translatedAttributes as $attribute) {
            $productCategory
                ->translateOrNew($translationCode)
                ->{$attribute} = $translatableAttributes[$translationCode][$attribute];
        }
        $productCategory->save();
        return $productCategory;
    }

    
}
