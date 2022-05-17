<?php

namespace App\Services\Country\UpdationStrategies;

use App\Models\Country;

class Context
{
    /**
     * @var \App\Services\Country\UpdationStrategies\UpdateStrategyInterface
     */
    private $updateStrategy;

    /**
     * Set the value of updateStrategy.
     *
     * @param \App\Services\Country\UpdationStrategies\UpdateStrategyInterface $updateStrategy
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
     * @param \App\Models\Country $city
     * @return Country
     */
    public function updateCountry(array $cityData, Country $city): Country
    {
        $city = $this->updateStrategy->update($cityData, $city);
        return $city;
    }
}
