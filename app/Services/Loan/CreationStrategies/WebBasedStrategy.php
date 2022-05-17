<?php

namespace App\Services\Loan\CreationStrategies;

use App\Models\Loan;
use App\Services\LoanService;

class WebBasedStrategy implements CreateStrategyInterface
{

    /**
     * Implementing the creation of a product category.
     *
     * @param array $loanData
     * @return \App\Models\Loan
     */
    public function create(array $loanData): Loan
    {

        $authenticatedUserId = auth()->id();
        $loanData['creator_id'] = $authenticatedUserId;
        $loanData['last_updater_id'] = $authenticatedUserId;


        $loanService = resolve(LoanService::class);

        $loan = $loanService->makeResource($loanData);

        
       
        return $loan;
    }

}
