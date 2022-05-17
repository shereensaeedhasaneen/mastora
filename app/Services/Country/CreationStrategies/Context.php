<?php

namespace App\Services\Country\CreationStrategies;

use App\Models\Country;

class Context
{
    /**
     * @var \App\Services\Country\CreationStrategies\CreateStrategyInterface
     */
    private $createStrategy;

    /**
     * Set the value of createStrategy.
     *
     * @param \App\Services\Country\CreationStrategies\CreateStrategyInterface $createStrategy
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
     * @return \App\Models\Country
     */
    public function createCountry(array $cityData): Country
    {
        $city = $this->createStrategy
            ->create($cityData);
        return $city;
    }
}
