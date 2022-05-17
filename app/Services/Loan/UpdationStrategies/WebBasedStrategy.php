<?php

namespace App\Services\Loan\UpdationStrategies;

use App\Models\Loan;
use App\Services\LoanService;

class WebBasedStrategy implements UpdateStrategyInterface
{

    /**
     * Implementing the updation of a product category.
     *
     * @param array $loanData
     * @param \App\Models\Loan $loan
     * @return \App\Models\Loan
     */
    public function update(array $loanData, Loan $loan): Loan
    {
        $authenticatedUserId = auth()->id();
        $loanData['last_updater_id'] = $authenticatedUserId;
        $loan = $this->updateLoan($loanData, $loan);
        return $loan;
    }

    /**
     * Update product category.
     *
     * @param array $loanWithWrappedTranslation
     * @return \App\Models\Loan
     */
    private function updateLoan(array $loanWithWrappedTranslation, Loan $loan): Loan
    {
        $loanService = resolve(LoanService::class);
        $loanWithWrappedTranslation = $this->calculate($loanWithWrappedTranslation);
        $updatedLoan = $loanService->updateResource($loanWithWrappedTranslation, $loan);
        return $updatedLoan;
    }


    private function calculate(array $loanWithWrappedTranslation)   
    {
        if(isset($loanWithWrappedTranslation['payment_period'])){
            $loanWithWrappedTranslation['number_of_installments'] = $loanWithWrappedTranslation['payment_period'] * 12;
            //$loanWithWrappedTranslation['depit_value'] = ;
            return $loanWithWrappedTranslation;

        }
        return $loanWithWrappedTranslation;
    }


    
}
