<?php

namespace App\Services\Cost\UpdationStrategies;

use App\Models\Cost;

interface UpdateStrategyInterface
{
    /**
     * Update Product Category contract.
     *
     * @param array $costData
     * @param \App\Models\Cost $cost
     * @return \App\Models\Cost
     */
    public function update(array $costData, Cost $cost): Cost;
}
