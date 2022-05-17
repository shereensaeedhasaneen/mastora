<?php

namespace App\Http\Controllers\Api;

use App\Models\Cost;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\CostService;
use App\Http\Controllers\Controller;
use App\Http\Requests\CostAditinalDataRequest;
use App\Http\Requests\CostRequest;
use App\Http\Resources\Cost\CostResource;
use App\Models\Loan;
use App\Services\Adapters\Fwmk\Api\FilteringSortingPagination\Cost\IndexingRequest\RequestToRetrieveResourceInterface;

class CostController extends Controller
{

    /**
     * Cost service.
     *
     * @var CostService
     */
    protected $service;

    /**
     * Cost API Controller
     *
     * @param \App\Services\CostService $CostService
     */
    public function __construct(CostService $CostService)
    {
        $this->service = $CostService;
        $this->middleware('auth:api')->except(['index' , 'show' ,'store' ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, RequestToRetrieveResourceInterface $requestToRetrieveResourceAdapter)
    {
        $arguments = $requestToRetrieveResourceAdapter->convert($request);
        $Costs = $this->service->retrieveResource(...$arguments);
        return response()->apiList(
            200,
            'Retrieve list of Costs successfully',
            null,
            //CostResource::collection($Costs)
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cost;  $Cost
     * @return \Illuminate\Http\Response
     */
    public function show(Cost $Cost): Response
    {
        return response()->apiObject(
            200,
            'Retrieve Cost #' . $Cost->id . ' successfully',
            null,
            //new CostResource($Cost)
        );
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cost;  $Cost
     * @return \Illuminate\Http\Response
     */
    public function store(CostRequest $request , Loan $loan)
    {   
        
        return $request ;
       
        // return response()->apiObject(
        //     200,
        //     'Retrieve Cost #' . $Cost->id . ' successfully',
        //     null,
        //     new CostResource($Cost)
        // );
    }
    
}
