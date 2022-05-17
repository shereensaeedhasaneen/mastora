<?php
namespace App\Services\Relative\CreationStrategies;

use App\Models\Relative;

interface CreateStrategyInterface
{
    /**
     * Create Relative contract.
     *
     * @param array $relativeData
     * @return \App\Models\Relative
     */
    public function create(array $relativeData): Relative;
}