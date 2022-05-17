<?php

namespace App\Services\Relative\UpdationStrategies;

use App\Models\Relative;

class Context
{
    /**
     * @var \App\Services\Relative\UpdationStrategies\UpdateStrategyInterface
     */
    private $updateStrategy;

    /**
     * Set the value of updateStrategy.
     *
     * @param \App\Services\Relative\UpdationStrategies\UpdateStrategyInterface $updateStrategy
     * @return  void
     */
    public function setUpdateStrategy(UpdateStrategyInterface $updateStrategy): void
    {
        $this->updateStrategy = $updateStrategy;
    }

    /**
     * Update product category.
     *
     * @param array $relativeData
     * @param \App\Models\Relative $relative
     * @return Relative
     */
    public function updateRelative(array $relativeData, Relative $relative): Relative
    {
        $relative = $this->updateStrategy->update($relativeData, $relative);
        return $relative;
    }
}
