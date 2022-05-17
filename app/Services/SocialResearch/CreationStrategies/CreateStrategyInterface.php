<?php
namespace App\Services\SocialResearch\CreationStrategies;

use App\Models\SocialResearch;

interface CreateStrategyInterface
{
    /**
     * Create SocialResearch contract.
     *
     * @param array $socialResearchData
     * @return \App\Models\SocialResearch
     */
    public function create(array $socialResearchData): SocialResearch;
}