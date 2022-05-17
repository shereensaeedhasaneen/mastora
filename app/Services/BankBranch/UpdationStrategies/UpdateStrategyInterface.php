<?php

namespace App\Services\BankBranch\UpdationStrategies;

use App\Models\BankBranch;

interface UpdateStrategyInterface
{
    /**
     * Update Product Category contract.
     *
     * @param array $cityData
     * @param \App\Models\BankBranch $city
     * @return \App\Models\BankBranch
     */
    public function update(array $cityData, BankBranch $city): BankBranch;
}
