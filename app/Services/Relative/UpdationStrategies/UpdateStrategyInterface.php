<?php

namespace App\Services\Relative\UpdationStrategies;

use App\Models\Relative;

interface UpdateStrategyInterface
{
    /**
     * Update Product Category contract.
     *
     * @param array $relativeData
     * @param \App\Models\Relative $relative
     * @return \App\Models\Relative
     */
    public function update(array $relativeData, Relative $relative): Relative;
}
