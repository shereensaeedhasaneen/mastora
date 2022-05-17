<?php

namespace App\Services\Loan\UpdationStrategies;

use App\Models\Loan;

interface UpdateStrategyInterface
{
    /**
     * Update Product Category contract.
     *
     * @param array $loanData
     * @param \App\Models\Loan $loan
     * @return \App\Models\Loan
     */
    public function update(array $loanData, Loan $loan): Loan;
}
