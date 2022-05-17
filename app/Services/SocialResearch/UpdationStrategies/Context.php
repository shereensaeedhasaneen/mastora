<?php

namespace App\Services\SocialResearch\UpdationStrategies;

use App\Models\SocialResearch;

class Context
{
    /**
     * @var \App\Services\SocialResearch\UpdationStrategies\UpdateStrategyInterface
     */
    private $updateStrategy;

    /**
     * Set the value of updateStrategy.
     *
     * @param \App\Services\SocialResearch\UpdationStrategies\UpdateStrategyInterface $updateStrategy
     * @return  void
     */
    public function setUpdateStrategy(UpdateStrategyInterface $updateStrategy): void
    {
        $this->updateStrategy = $updateStrategy;
    }

    /**
     * Update product category.
     *
     * @param array $socialResearchData
     * @param \App\Models\SocialResearch $socialResearch
     * @return SocialResearch
     */
    public function updateSocialResearch(array $socialResearchData, SocialResearch $socialResearch): SocialResearch
    {
        $socialResearch = $this->updateStrategy->update($socialResearchData, $socialResearch);
        return $socialResearch;
    }
}
