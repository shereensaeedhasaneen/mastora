<?php

namespace App\Services\City\UpdationStrategies;

use App\Models\City;

interface UpdateStrategyInterface
{
    /**
     * Update Product Category contract.
     *
     * @param array $cityData
     * @param \App\Models\City $city
     * @return \App\Models\City
     */
    public function update(array $cityData, City $city): City;
}
