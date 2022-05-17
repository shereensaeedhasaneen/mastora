<?php

namespace App\Services;

use App\Models\Cost;
use App\Repositories\CostRepo;
use App\Services\Cost\CreationStrategies\Context as CreateContext;
use App\Services\Cost\CreationStrategies\WebBasedStrategy as CreateWebBasedStrategy;
use App\Services\Cost\UpdationStrategies\Context as updateContext;
use App\Services\Cost\UpdationStrategies\WebBasedStrategy as updateWebBasedStrategy;

class CostService extends AbstractService
{
    /**
     * Product Category repo
     *
     * @var \App\Repositories\CostRepo
     */
    protected $repo;

    /**
     * CostService constructor.
     *
     * @param  \App\Repositories\CostRepo  $repo
     */
    public function __construct(CostRepo $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Make resource web based.
     * 
     * @param array $costData
     * @return \App\Models\Cost
     */
    public function makeResourceWebBased(array $costData): Cost
    {
        $context = resolve(CreateContext::class);
        $webBasedStrategy = resolve(CreateWebBasedStrategy::class);
        $context->setCreateStrategy($webBasedStrategy);
        $Cost = $context->createCost($costData);
        return $Cost;
    }

    /**
     * Update resource web based.
     * 
     * @param array $costData
     * @param \App\Models\Cost $Cost
     * @return \App\Models\Cost
     */
    public function updateResourceWebBased(array $costData, Cost $cost): Cost
    {
        $context = resolve(updateContext::class);
        $webBasedStrategy = resolve(updateWebBasedStrategy::class);
        $context->setUpdateStrategy($webBasedStrategy);
        $updatedCost = $context->updateCost($costData, $cost);
        return $updatedCost;
    }
}
