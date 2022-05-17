<?php

namespace App\Services\BankBranch\CreationStrategies;

use App\Models\BankBranch;

class Context
{
    /**
     * @var \App\Services\BankBranch\CreationStrategies\CreateStrategyInterface
     */
    private $createStrategy;

    /**
     * Set the value of createStrategy.
     *
     * @param \App\Services\BankBranch\CreationStrategies\CreateStrategyInterface $createStrategy
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
     * @return \App\Models\BankBranch
     */
    public function createBankBranch(array $cityData): BankBranch
    {
        $city = $this->createStrategy
            ->create($cityData);
        return $city;
    }
}
