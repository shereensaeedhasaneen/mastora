<?php
namespace App\Services\BankBranch\CreationStrategies;

use App\Models\BankBranch;

interface CreateStrategyInterface
{
    /**
     * Create BankBranch contract.
     *
     * @param array $cityData
     * @return \App\Models\BankBranch
     */
    public function create(array $cityData): BankBranch;
}