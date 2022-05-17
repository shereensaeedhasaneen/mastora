<?php
namespace App\Services\Country\CreationStrategies;

use App\Models\Country;

interface CreateStrategyInterface
{
    /**
     * Create Country contract.
     *
     * @param array $cityData
     * @return \App\Models\Country
     */
    public function create(array $cityData): Country;
}