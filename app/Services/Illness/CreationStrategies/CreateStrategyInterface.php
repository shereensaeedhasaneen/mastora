<?php
namespace App\Services\Illness\CreationStrategies;

use App\Models\Illness;

interface CreateStrategyInterface
{
    /**
     * Create Illness contract.
     *
     * @param array $illnessData
     * @return \App\Models\Illness
     */
    public function create(array $illnessData): Illness;
}