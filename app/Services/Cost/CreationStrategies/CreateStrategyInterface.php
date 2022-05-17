<?php
namespace App\Services\Cost\CreationStrategies;

use App\Models\Cost;

interface CreateStrategyInterface
{
    /**
     * Create Cost contract.
     *
     * @param array $costData
     * @return \App\Models\Cost
     */
    public function create(array $costData): Cost;
}