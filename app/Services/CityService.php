<?php

namespace App\Services;

use App\Models\City;
use App\Repositories\CityRepo;
use App\Services\City\CreationStrategies\Context as CreateContext;
use App\Services\City\CreationStrategies\WebBasedStrategy as CreateWebBasedStrategy;
use App\Services\City\UpdationStrategies\Context as updateContext;
use App\Services\City\UpdationStrategies\WebBasedStrategy as updateWebBasedStrategy;

class CityService extends AbstractService
{
    /**
     * Product Category repo
     *
     * @var \App\Repositories\CityRepo
     */
    protected $repo;

    /**
     * CityService constructor.
     *
     * @param  \App\Repositories\CityRepo  $repo
     */
    public function __construct(CityRepo $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Make resource web based.
     * 
     * @param array $productCategoryData
     * @return \App\Models\City
     */
    public function makeResourceWebBased(array $productCategoryData): City
    {
        $context = resolve(CreateContext::class);
        $webBasedStrategy = resolve(CreateWebBasedStrategy::class);
        $context->setCreateStrategy($webBasedStrategy);
        $City = $context->createCity($productCategoryData);
        return $City;
    }

    /**
     * Update resource web based.
     * 
     * @param array $productCategoryData
     * @param \App\Models\City $City
     * @return \App\Models\City
     */
    public function updateResourceWebBased(array $productCategoryData, City $productCategory): City
    {
        $context = resolve(updateContext::class);
        $webBasedStrategy = resolve(updateWebBasedStrategy::class);
        $context->setUpdateStrategy($webBasedStrategy);
        $updatedCity = $context->updateCity($productCategoryData, $productCategory);
        return $updatedCity;
    }
}
