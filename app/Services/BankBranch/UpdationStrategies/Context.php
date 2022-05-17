<?php

namespace App\Services\BankBranch\UpdationStrategies;

use App\Models\BankBranch;

class Context
{
    /**
     * @var \App\Services\BankBranch\UpdationStrategies\UpdateStrategyInterface
     */
    private $updateStrategy;

    /**
     * Set the value of updateStrategy.
     *
     * @param \App\Services\BankBranch\UpdationStrategies\UpdateStrategyInterface $updateStrategy
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
     * @param \App\Models\BankBranch $city
     * @return BankBranch
     */
    public function updateBankBranch(array $cityData, BankBranch $city): BankBranch
    {
        $city = $this->updateStrategy->update($cityData, $city);
        return $city;
    }
}
