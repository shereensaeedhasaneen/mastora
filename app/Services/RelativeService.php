<?php

namespace App\Services;

use App\Models\Relative;
use App\Repositories\RelativeRepo;
use App\Services\Relative\CreationStrategies\Context as CreateContext;
use App\Services\Relative\CreationStrategies\WebBasedStrategy as CreateWebBasedStrategy;
use App\Services\Relative\UpdationStrategies\Context as updateContext;
use App\Services\Relative\UpdationStrategies\WebBasedStrategy as updateWebBasedStrategy;

class RelativeService extends AbstractService
{
    /**
     * Product Category repo
     *
     * @var \App\Repositories\RelativeRepo
     */
    protected $repo;

    /**
     * RelativeService constructor.
     *
     * @param  \App\Repositories\RelativeRepo  $repo
     */
    public function __construct(RelativeRepo $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Make resource web based.
     * 
     * @param array $relativeData
     * @return \App\Models\Relative
     */
    public function makeResourceWebBased(array $relativeData): Relative
    {
        $context = resolve(CreateContext::class);
        $webBasedStrategy = resolve(CreateWebBasedStrategy::class);
        $context->setCreateStrategy($webBasedStrategy);
        $Relative = $context->createRelative($relativeData);
        return $Relative;
    }

    /**
     * Update resource web based.
     * 
     * @param array $relativeData
     * @param \App\Models\Relative $Relative
     * @return \App\Models\Relative
     */
    public function updateResourceWebBased(array $relativeData, Relative $relative): Relative
    {
        $context = resolve(updateContext::class);
        $webBasedStrategy = resolve(updateWebBasedStrategy::class);
        $context->setUpdateStrategy($webBasedStrategy);
        $updatedRelative = $context->updateRelative($relativeData, $relative);
        return $updatedRelative;
    }
}
