<?php

namespace App\Services\SocialResearch\CreationStrategies;

use App\Models\SocialResearch;

class Context
{
    /**
     * @var \App\Services\SocialResearch\CreationStrategies\CreateStrategyInterface
     */
    private $createStrategy;

    /**
     * Set the value of createStrategy.
     *
     * @param \App\Services\SocialResearch\CreationStrategies\CreateStrategyInterface $createStrategy
     * @return  void
     */
    public function setCreateStrategy(CreateStrategyInterface $createStrategy): void
    {
        $this->createStrategy = $createStrategy;
    }

    /**
     * Create Product category.
     *
     * @param array $socialResearchData
     * @return \App\Models\SocialResearch
     */
    public function createSocialResearch(array $socialResearchData): SocialResearch
    {
        $socialResearch = $this->createStrategy
            ->create($socialResearchData);
        return $socialResearch;
    }
}
