<?php

namespace App\Services\Illness\CreationStrategies;

use App\Models\Illness;

class Context
{
    /**
     * @var \App\Services\Illness\CreationStrategies\CreateStrategyInterface
     */
    private $createStrategy;

    /**
     * Set the value of createStrategy.
     *
     * @param \App\Services\Illness\CreationStrategies\CreateStrategyInterface $createStrategy
     * @return  void
     */
    public function setCreateStrategy(CreateStrategyInterface $createStrategy): void
    {
        $this->createStrategy = $createStrategy;
    }

    /**
     * Create Product category.
     *
     * @param array $illnessData
     * @return \App\Models\Illness
     */
    public function createIllness(array $illnessData): Illness
    {
        $illness = $this->createStrategy
            ->create($illnessData);
        return $illness;
    }
}
