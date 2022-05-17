<?php

namespace App\Services\Adapters\Fwmk\Api\FilteringSortingPagination\Loan\IndexingRequest;

use App\Enums\LoanStatus;
use App\Enums\UserType;
use Illuminate\Http\Request;
use App\Services\Adapters\Fwmk\Api\FilteringSortingPagination\SortingValidator;

class RequestToRetrieveResourceAdapter implements RequestToRetrieveResourceInterface
{
    use SortingValidator;

    /**
     * Convert request parameters to service retrieveResource method arguments.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function convert(Request $request): array
    {
        $limit = $request->input('limit');
        $sort = "id";
        //$sort['id'] = "ASC" ;
        $approvalStatus =$request->input('approvalStatus');
        $loan_uniqe_id =$request->input('loan_uniqe_id');
        $is_research_done =$request->input('done');

        $filter = [];
        $with = [];
        $paginate = true;
        $perPage = $limit;
        $sorting = [];

        //$filter = $this->validateTypeFilter($filter);
        $filter = $this->validateSerchFilter( $loan_uniqe_id ,  $filter);
        $filter = $this->validateApprovalStatusFilter( $approvalStatus ,  $filter);
        $sorting = $this->validateSorting($sort);

        // The order of the elements of the array below is mandatory.
        $arguments = [];
        $arguments[] = $filter;
        $arguments[] = $with;
        $arguments[] = $paginate;
        $arguments[] = $perPage;
        $arguments[] = $sorting;

        return $arguments;
    }

    private function validateApprovalStatusFilter($approvalStatus , array $filter): array
    {
        if($approvalStatus && $approvalStatus!= "ASSIGNED"){
            $filter['loanStatus']['status']= $approvalStatus; 
            $filter['loanStatus']['user_id'] = auth()->id();
            return $filter;
        }elseif ($approvalStatus== "ASSIGNED") {
            $filter['loanStatus']['status']= $approvalStatus; 
            $filter['loan']['assigned_id'] = auth()->id();
            return $filter;
        }
        return $this->validateTypeFilter($filter);
        
    }
    
    private function validateSerchFilter($loan_uniqe_id , array $filter): array
    {
        if($loan_uniqe_id){
            $filter['loan']['loan_uniqe_id']= $loan_uniqe_id; 
            return $filter;
        }

        return $filter;
        
    }

    private function validateTypeFilter(array $filter): array
    {
        if (!auth()->check()) {
            return $filter;
        }
        
        switch (auth()->user()->user_type) {
            case UserType::getValue('ACCOUNTMANGER'):
                $filter['loan']['status'] = LoanStatus::getValue('BRANCHREVIEW');
                $filter['loan']['bank_branch_id'] = auth()->user()->bank->id;
                $filter['loan']['assigned_id'] = "Is Null";
                return $filter;
                break;
            case UserType::getValue('PARTNER'):
                $filter['loan']['status'] = [LoanStatus::getValue('PARTNERREVIEW')];
                $filter['loan']['partner_id'] = auth()->user()->id;
                return $filter;
                break;
            case UserType::getValue('BRANCHMANGER'):
                $filter['loan']['status'] = [LoanStatus::getValue('CREDITBRANCH')  ];
                return $filter;
                break;
            case UserType::getValue('CENTERMANGER'):
                //$filter['loan']['status'] = [LoanStatus::getValue('CENTERBRANCH') , 6,7,8,9,10,11 ];
                return $filter;
                break;
            
            default:
                return $filter;
                break;
        }
       
    }
}
