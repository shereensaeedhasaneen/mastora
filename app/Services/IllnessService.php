<?php

namespace App\Services;

use App\Models\Illness;
use App\Repositories\IllnessRepo;
use App\Services\Illness\CreationStrategies\Context as CreateContext;
use App\Services\Illness\CreationStrategies\WebBasedStrategy as CreateWebBasedStrategy;
use App\Services\Illness\UpdationStrategies\Context as updateContext;
use App\Services\Illness\UpdationStrategies\WebBasedStrategy as updateWebBasedStrategy;

class IllnessService extends AbstractService
{
    /**
     * Product Category repo
     *
     * @var \App\Repositories\IllnessRepo
     */
    protected $repo;

    /**
     * IllnessService constructor.
     *
     * @param  \App\Repositories\IllnessRepo  $repo
     */
    public function __construct(IllnessRepo $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Make resource web based.
     * 
     * @param array $costData
     * @return \App\Models\Illness
     */
    public function makeResourceWebBased(array $costData): Illness
    {
        $context = resolve(CreateContext::class);
        $webBasedStrategy = resolve(CreateWebBasedStrategy::class);
        $context->setCreateStrategy($webBasedStrategy);
        $Illness = $context->createIllness($costData);
        return $Illness;
    }

    /**
     * Update resource web based.
     * 
     * @param array $costData
     * @param \App\Models\Illness $Illness
     * @return \App\Models\Illness
     */
    public function updateResourceWebBased(array $costData, Illness $cost): Illness
    {
        $context = resolve(updateContext::class);
        $webBasedStrategy = resolve(updateWebBasedStrategy::class);
        $context->setUpdateStrategy($webBasedStrategy);
        $updatedIllness = $context->updateIllness($costData, $cost);
        return $updatedIllness;
    }
}
