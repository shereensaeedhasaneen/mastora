<?php

namespace App\Services\ProductCategory\CreationStrategies;

use App\Models\ProductCategory;
use App\Services\ProductCategoryService;
use App\Exceptions\FWMK\DefaultTranslationLanguageException;

class WebBasedStrategy implements CreateStrategyInterface
{

    /**
     * Implementing the creation of a product category.
     *
     * @param array $productCategoryData
     * @return \App\Models\ProductCategory
     * @throws \App\Exceptions\FWMK\DefaultTranslationLanguageException
     */
    public function create(array $productCategoryData): ProductCategory
    {
        if (!isDefaultLanguage($productCategoryData['translation_language'])) {
            throw new DefaultTranslationLanguageException();
        }

        $authenticatedUserId = auth()->id();
        $productCategoryData['creator_id'] = $authenticatedUserId;
        $productCategoryData['last_updater_id'] = $authenticatedUserId;

        $productCategoryWithWrappedTranslation = fillingTranslation($productCategoryData);

        $productCategoryService = resolve(ProductCategoryService::class);

        $productCategory = $productCategoryService->makeResource($productCategoryWithWrappedTranslation);
        
       
        return $productCategory;
    }

}
