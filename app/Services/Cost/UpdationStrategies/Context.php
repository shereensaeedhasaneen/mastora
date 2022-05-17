<?php

namespace App\Services\Cost\UpdationStrategies;

use App\Models\Cost;

class Context
{
    /**
     * @var \App\Services\Cost\UpdationStrategies\UpdateStrategyInterface
     */
    private $updateStrategy;

    /**
     * Set the value of updateStrategy.
     *
     * @param \App\Services\Cost\UpdationStrategies\UpdateStrategyInterface $updateStrategy
     * @return  void
     */
    public function setUpdateStrategy(UpdateStrategyInterface $updateStrategy): void
    {
        $this->updateStrategy = $updateStrategy;
    }

    /**
     * Update product category.
     *
     * @param array $costData
     * @param \App\Models\Cost $cost
     * @return Cost
     */
    public function updateCost(array $costData, Cost $cost): Cost
    {
        $cost = $this->updateStrategy->update($costData, $cost);
        return $cost;
    }
}
