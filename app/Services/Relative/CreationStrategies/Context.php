<?php

namespace App\Services\Relative\CreationStrategies;

use App\Models\Relative;

class Context
{
    /**
     * @var \App\Services\Relative\CreationStrategies\CreateStrategyInterface
     */
    private $createStrategy;

    /**
     * Set the value of createStrategy.
     *
     * @param \App\Services\Relative\CreationStrategies\CreateStrategyInterface $createStrategy
     * @return  void
     */
    public function setCreateStrategy(CreateStrategyInterface $createStrategy): void
    {
        $this->createStrategy = $createStrategy;
    }

    /**
     * Create Product category.
     *
     * @param array $relativeData
     * @return \App\Models\Relative
     */
    public function createRelative(array $relativeData): Relative
    {
        $relative = $this->createStrategy
            ->create($relativeData);
        return $relative;
    }
}
