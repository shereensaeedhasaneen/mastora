<?php

namespace App\Http\Controllers\ApiV2;

use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\LoanService;
use App\Http\Controllers\Controller;
use App\Http\Requests\FieldInquiryRequest;
use App\Http\Requests\LoanAditinalDataRequest;
use App\Http\Requests\LoanDataRequest;
use App\Http\Resources\Loan\LoanResource;
use App\Services\Adapters\Fwmk\Api\FilteringSortingPagination\Loan\IndexingRequest\RequestToRetrieveResourceInterface;

class LoanController extends Controller
{

    /**
     * Loan service.
     *
     * @var LoanService
     */
    protected $service;

    /**
     * Loan API Controller
     *
     * @param \App\Services\LoanService $loanService
     */
    public function __construct(LoanService $loanService)
    {
        $this->service = $loanService;
        $this->middleware('auth:api')->except([  'show' ,'store' , 'storeFieldInquiry' ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, RequestToRetrieveResourceInterface $requestToRetrieveResourceAdapter)
    {
        $filters =[];
        $is_done_submit = $request->input('done');
        $filters = $this->validateArchiveFilter($is_done_submit ,$filters);
        $loans = $this->service->retrieveResource($filters);
        return response()->apiList(
            200,
            'Retrieve list of loans successfully',
            null,
            LoanResource::collection($loans)
        );
    }

    
    private function validateArchiveFilter($is_done_submit , array $filter): array
    {
        if($is_done_submit){
            $filter['loan']['is_done_submit']= $is_done_submit; 
            return $filter;
        }

        return $filter;
        
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Loan;  $loan
     * @return \Illuminate\Http\Response
     */
    public function show(Loan $loan): Response
    {
        return response()->apiObject(
            200,
            'Retrieve loan #' . $loan->id . ' successfully',
            null,
            new LoanResource($loan)
        );
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Loan;  $loan
     * @return \Illuminate\Http\Response
     */
    public function store(LoanDataRequest $request)
    {   
        $loan = Loan::create($request->all());
        if($loan){
            return response($loan, 200);
        }
        return response("invalid", 400);
       
        // return response()->apiObject(
        //     200,
        //     'Retrieve loan #' . $loan->id . ' successfully',
        //     null,
        //     new LoanResource($loan)
        // );
    }
    
    public function storeFieldInquiry(FieldInquiryRequest $request)
    {
        
        return $request;
       
        // return response()->apiObject(
        //     200,
        //     'Retrieve loan #' . $loan->id . ' successfully',
        //     null,
        //     new LoanResource($loan)
        // );
    }
}
