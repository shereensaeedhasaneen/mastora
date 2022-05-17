<?php

namespace App\Services;

use App\Models\SocialResearch;
use App\Repositories\SocialResearchRepo;
use App\Services\SocialResearch\CreationStrategies\Context as CreateContext;
use App\Services\SocialResearch\CreationStrategies\WebBasedStrategy as CreateWebBasedStrategy;
use App\Services\SocialResearch\UpdationStrategies\Context as updateContext;
use App\Services\SocialResearch\UpdationStrategies\WebBasedStrategy as updateWebBasedStrategy;

class SocialResearchService extends AbstractService
{
    /**
     * Product Category repo
     *
     * @var \App\Repositories\SocialResearchRepo
     */
    protected $repo;

    /**
     * SocialResearchService constructor.
     *
     * @param  \App\Repositories\SocialResearchRepo  $repo
     */
    public function __construct(SocialResearchRepo $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Make resource web based.
     * 
     * @param array $socialResearchData
     * @return \App\Models\SocialResearch
     */
    public function makeResourceWebBased(array $socialResearchData): SocialResearch
    {
        $context = resolve(CreateContext::class);
        $webBasedStrategy = resolve(CreateWebBasedStrategy::class);
        $context->setCreateStrategy($webBasedStrategy);
        $socialResearch = $context->createSocialResearch($socialResearchData);
        return $socialResearch;
    }

    /**
     * Update resource web based.
     * 
     * @param array $socialResearchData
     * @param \App\Models\SocialResearch $SocialResearch
     * @return \App\Models\SocialResearch
     */
    public function updateResourceWebBased(array $socialResearchData, SocialResearch $socialResearch): SocialResearch
    {
        $context = resolve(updateContext::class);
        $webBasedStrategy = resolve(updateWebBasedStrategy::class);
        $context->setUpdateStrategy($webBasedStrategy);
        $updatedSocialResearch = $context->updateSocialResearch($socialResearchData, $socialResearch);
        return $updatedSocialResearch;
    }
}
