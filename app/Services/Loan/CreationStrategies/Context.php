<?php

namespace App\Services\Loan\CreationStrategies;

use App\Models\Loan;

class Context
{
    /**
     * @var \App\Services\Loan\CreationStrategies\CreateStrategyInterface
     */
    private $createStrategy;

    /**
     * Set the value of createStrategy.
     *
     * @param \App\Services\Loan\CreationStrategies\CreateStrategyInterface $createStrategy
     * @return  void
     */
    public function setCreateStrategy(CreateStrategyInterface $createStrategy): void
    {
        $this->createStrategy = $createStrategy;
    }

    /**
     * Create Product category.
     *
     * @param array $loanData
     * @return \App\Models\Loan
     */
    public function createLoan(array $loanData): Loan
    {
        $loan = $this->createStrategy
            ->create($loanData);
        return $loan;
    }
}
