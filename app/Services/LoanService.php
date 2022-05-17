<?php

namespace App\Services;

use App\Models\Loan;
use App\Repositories\LoanRepo;
use App\Services\Loan\CreationStrategies\Context as CreateContext;
use App\Services\Loan\CreationStrategies\WebBasedStrategy as CreateWebBasedStrategy;
use App\Services\Loan\UpdationStrategies\Context as updateContext;
use App\Services\Loan\UpdationStrategies\WebBasedStrategy as updateWebBasedStrategy;

class LoanService extends AbstractService
{
    /**
     * Product Category repo
     *
     * @var \App\Repositories\LoanRepo
     */
    protected $repo;

    /**
     * LoanService constructor.
     *
     * @param  \App\Repositories\LoanRepo  $repo
     */
    public function __construct(LoanRepo $repo)
    {
        $this->repo = $repo;
    }

    /**
     * make uniqe id for loun
     * 
     */
    private function makeLounUniqeId($loanData)
    {
        $loanData['loan_uniqe_id'] = rand(1111111111111, 9999999999999);
        $loanData['status'] = 1;
        return $loanData;
    }
    /**
     * Make resource web based.
     * 
     * @param array $loanData
     * @return \App\Models\Loan
     */
    public function makeResourceWebBased(array $loanData): Loan
    {
        $loanData = $this->makeLounUniqeId($loanData);
        $context = resolve(CreateContext::class);
        $webBasedStrategy = resolve(CreateWebBasedStrategy::class);
        $context->setCreateStrategy($webBasedStrategy);
        $Loan = $context->createLoan($loanData);
        return $Loan;
    }

    /**
     * Update resource web based.
     * 
     * @param array $loanData
     * @param \App\Models\Loan $Loan
     * @return \App\Models\Loan
     */
    public function updateResourceWebBased(array $loanData, Loan $loan): Loan
    {
        $loanData = $this->loanPriceModify($loanData, $loan);
        $context = resolve(updateContext::class);
        $webBasedStrategy = resolve(updateWebBasedStrategy::class);
        $context->setUpdateStrategy($webBasedStrategy);
        $updatedLoan = $context->updateLoan($loanData, $loan);
        return $updatedLoan;
    }

    public function updateStatus($userId ,  array $statusData, Loan $loan): Loan
    {
        $loan->userStatus()->attach($userId , $statusData);
        return $loan;
    }

    private  function loanPriceModify(array $loanData, Loan $loan)
    {
        if( isset($loanData['price']) && $loan->payment_period){
            $loanData['depit_value'] = ($loanData['price'] * (1 + ($loan->payment_period * 3.5) / 100)) / ($loan->payment_period *12) ; //($loan->price * ($loan->price * 9 /100) );
            return $loanData; 
        }
        return $loanData;
        
    }
}
