<?php

namespace App\Services\Country\UpdationStrategies;

use App\Models\Country;

interface UpdateStrategyInterface
{
    /**
     * Update Product Category contract.
     *
     * @param array $cityData
     * @param \App\Models\Country $city
     * @return \App\Models\Country
     */
    public function update(array $cityData, Country $city): Country;
}
