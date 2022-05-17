<?php

namespace App\Services\Illness\UpdationStrategies;

use App\Models\Illness;

class Context
{
    /**
     * @var \App\Services\Illness\UpdationStrategies\UpdateStrategyInterface
     */
    private $updateStrategy;

    /**
     * Set the value of updateStrategy.
     *
     * @param \App\Services\Illness\UpdationStrategies\UpdateStrategyInterface $updateStrategy
     * @return  void
     */
    public function setUpdateStrategy(UpdateStrategyInterface $updateStrategy): void
    {
        $this->updateStrategy = $updateStrategy;
    }

    /**
     * Update product category.
     *
     * @param array $illnessData
     * @param \App\Models\Illness $illness
     * @return Illness
     */
    public function updateIllness(array $illnessData, Illness $illness): Illness
    {
        $illness = $this->updateStrategy->update($illnessData, $illness);
        return $illness;
    }
}
