<?php

namespace App\Services\SocialResearch\CreationStrategies;

use App\Models\SocialResearch;
use App\Services\SocialResearchService;

class WebBasedStrategy implements CreateStrategyInterface
{

    /**
     * Implementing the creation of a product category.
     *
     * @param array $socialResearchData
     * @return \App\Models\SocialResearch
     */
    public function create(array $socialResearchData): SocialResearch
    {

        $socialResearchService = resolve(SocialResearchService::class);

        $socialResearch = $socialResearchService->makeResource($socialResearchData);
        
        return $socialResearch;
    }

}
