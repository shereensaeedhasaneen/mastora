<?php
namespace App\Services\Loan\CreationStrategies;

use App\Models\Loan;

interface CreateStrategyInterface
{
    /**
     * Create Loan contract.
     *
     * @param array $loanData
     * @return \App\Models\Loan
     */
    public function create(array $loanData): Loan;
}