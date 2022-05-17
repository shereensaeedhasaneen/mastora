<?php

namespace App\Services\Cost\CreationStrategies;

use App\Models\Cost;

class Context
{
    /**
     * @var \App\Services\Cost\CreationStrategies\CreateStrategyInterface
     */
    private $createStrategy;

    /**
     * Set the value of createStrategy.
     *
     * @param \App\Services\Cost\CreationStrategies\CreateStrategyInterface $createStrategy
     * @return  void
     */
    public function setCreateStrategy(CreateStrategyInterface $createStrategy): void
    {
        $this->createStrategy = $createStrategy;
    }

    /**
     * Create Product category.
     *
     * @param array $costData
     * @return \App\Models\Cost
     */
    public function createCost(array $costData): Cost
    {
        $cost = $this->createStrategy
            ->create($costData);
        return $cost;
    }
}
