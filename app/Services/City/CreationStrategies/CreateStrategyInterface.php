<?php
namespace App\Services\City\CreationStrategies;

use App\Models\City;

interface CreateStrategyInterface
{
    /**
     * Create City contract.
     *
     * @param array $cityData
     * @return \App\Models\City
     */
    public function create(array $cityData): City;
}