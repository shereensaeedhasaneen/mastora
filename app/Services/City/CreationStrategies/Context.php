<?php

namespace App\Services\City\CreationStrategies;

use App\Models\City;

class Context
{
    /**
     * @var \App\Services\City\CreationStrategies\CreateStrategyInterface
     */
    private $createStrategy;

    /**
     * Set the value of createStrategy.
     *
     * @param \App\Services\City\CreationStrategies\CreateStrategyInterface $createStrategy
     * @return  void
     */
    public function setCreateStrategy(CreateStrategyInterface $createStrategy): void
    {
        $this->createStrategy = $createStrategy;
    }

    /**
     * Create Product category.
     *
     * @param array $cityData
     * @return \App\Models\City
     */
    public function createCity(array $cityData): City
    {
        $city = $this->createStrategy
            ->create($cityData);
        return $city;
    }
}
