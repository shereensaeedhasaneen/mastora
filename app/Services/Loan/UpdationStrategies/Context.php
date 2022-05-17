<?php

namespace App\Services\Loan\UpdationStrategies;

use App\Models\Loan;

class Context
{
    /**
     * @var \App\Services\Loan\UpdationStrategies\UpdateStrategyInterface
     */
    private $updateStrategy;

    /**
     * Set the value of updateStrategy.
     *
     * @param \App\Services\Loan\UpdationStrategies\UpdateStrategyInterface $updateStrategy
     * @return  void
     */
    public function setUpdateStrategy(UpdateStrategyInterface $updateStrategy): void
    {
        $this->updateStrategy = $updateStrategy;
    }

    /**
     * Update product category.
     *
     * @param array $loanData
     * @param \App\Models\Loan $loan
     * @return Loan
     */
    public function updateLoan(array $loanData, Loan $loan): Loan
    {
        $loan = $this->updateStrategy->update($loanData, $loan);
        return $loan;
    }
}
