<?php

namespace App\Services\Illness\UpdationStrategies;

use App\Models\Illness;

interface UpdateStrategyInterface
{
    /**
     * Update Product Category contract.
     *
     * @param array $illnessData
     * @param \App\Models\Illness $illness
     * @return \App\Models\Illness
     */
    public function update(array $illnessData, Illness $illness): Illness;
}
