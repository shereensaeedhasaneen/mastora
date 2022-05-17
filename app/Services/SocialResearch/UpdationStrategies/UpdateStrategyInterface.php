<?php

namespace App\Services\SocialResearch\UpdationStrategies;

use App\Models\SocialResearch;

interface UpdateStrategyInterface
{
    /**
     * Update Product Category contract.
     *
     * @param array $socialResearchData
     * @param \App\Models\SocialResearch $socialResearch
     * @return \App\Models\SocialResearch
     */
    public function update(array $socialResearchData, SocialResearch $socialResearch): SocialResearch;
}
