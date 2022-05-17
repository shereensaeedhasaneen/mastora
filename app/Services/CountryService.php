<?php

namespace App\Services;

use App\Models\Country;
use App\Repositories\CountryRepo;
use App\Services\Country\CreationStrategies\Context as CreateContext;
use App\Services\Country\CreationStrategies\WebBasedStrategy as CreateWebBasedStrategy;
use App\Services\Country\UpdationStrategies\Context as updateContext;
use App\Services\Country\UpdationStrategies\WebBasedStrategy as updateWebBasedStrategy;

class CountryService extends AbstractService
{
    /**
     * Product Category repo
     *
     * @var \App\Repositories\CountryRepo
     */
    protected $repo;

    /**
     * CountryService constructor.
     *
     * @param  \App\Repositories\CountryRepo  $repo
     */
    public function __construct(CountryRepo $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Make resource web based.
     * 
     * @param array $productCategoryData
     * @return \App\Models\Country
     */
    public function makeResourceWebBased(array $productCategoryData): Country
    {
        $context = resolve(CreateContext::class);
        $webBasedStrategy = resolve(CreateWebBasedStrategy::class);
        $context->setCreateStrategy($webBasedStrategy);
        $Country = $context->createCountry($productCategoryData);
        return $Country;
    }

    /**
     * Update resource web based.
     * 
     * @param array $productCategoryData
     * @param \App\Models\Country $Country
     * @return \App\Models\Country
     */
    public function updateResourceWebBased(array $productCategoryData, Country $productCategory): Country
    {
        $context = resolve(updateContext::class);
        $webBasedStrategy = resolve(updateWebBasedStrategy::class);
        $context->setUpdateStrategy($webBasedStrategy);
        $updatedCountry = $context->updateCountry($productCategoryData, $productCategory);
        return $updatedCountry;
    }
}
