<?php

namespace App\Services;

use App\Models\ProductCategory;
use App\Repositories\ProductCategoryRepo;
use App\Services\ProductCategory\CreationStrategies\Context as CreateContext;
use App\Services\ProductCategory\CreationStrategies\WebBasedStrategy as CreateWebBasedStrategy;
use App\Services\ProductCategory\UpdationStrategies\Context as updateContext;
use App\Services\ProductCategory\UpdationStrategies\WebBasedStrategy as updateWebBasedStrategy;

class ProductCategoryService extends AbstractService
{
    /**
     * Product Category repo
     *
     * @var \App\Repositories\ProductCategoryRepo
     */
    protected $repo;

    /**
     * ProductCategoryService constructor.
     *
     * @param  \App\Repositories\ProductCategoryRepo  $repo
     */
    public function __construct(ProductCategoryRepo $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Make resource web based.
     * 
     * @param array $productCategoryData
     * @return \App\Models\ProductCategory
     */
    public function makeResourceWebBased(array $productCategoryData): ProductCategory
    {
        $context = resolve(CreateContext::class);
        $webBasedStrategy = resolve(CreateWebBasedStrategy::class);
        $context->setCreateStrategy($webBasedStrategy);
        $ProductCategory = $context->createProductCategory($productCategoryData);
        return $ProductCategory;
    }

    /**
     * Update resource web based.
     * 
     * @param array $productCategoryData
     * @param \App\Models\ProductCategory $ProductCategory
     * @return \App\Models\ProductCategory
     */
    public function updateResourceWebBased(array $productCategoryData, ProductCategory $productCategory): ProductCategory
    {
        $context = resolve(updateContext::class);
        $webBasedStrategy = resolve(updateWebBasedStrategy::class);
        $context->setUpdateStrategy($webBasedStrategy);
        $updatedProductCategory = $context->updateProductCategory($productCategoryData, $productCategory);
        return $updatedProductCategory;
    }
}
