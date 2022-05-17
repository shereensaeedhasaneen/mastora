<?php

namespace App\Services\City\UpdationStrategies;

use App\Models\City;

class Context
{
    /**
     * @var \App\Services\City\UpdationStrategies\UpdateStrategyInterface
     */
    private $updateStrategy;

    /**
     * Set the value of updateStrategy.
     *
     * @param \App\Services\City\UpdationStrategies\UpdateStrategyInterface $updateStrategy
     * @return  void
     */
    public function setUpdateStrategy(UpdateStrategyInterface $updateStrategy): void
    {
        $this->updateStrategy = $updateStrategy;
    }

    /**
     * Update product category.
     *
     * @param array $cityData
     * @param \App\Models\City $city
     * @return City
     */
    public function updateCity(array $cityData, City $city): City
    {
        $city = $this->updateStrategy->update($cityData, $city);
        return $city;
    }
}
