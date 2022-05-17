<?php

namespace App\Http\Controllers\ApiV2;

use App\Enums\CostStatus;
use App\Models\Cost;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\CostService;
use App\Http\Controllers\Controller;
use App\Http\Requests\CostAditinalDataRequest;
use App\Http\Requests\CostRequest;
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
        $costs = $this->validateRequest($request);
        foreach ($costs['data'] as $cost) {
            $data = $cost;
            $data['loan_id'] = $loan->id;
            $data['type'] = $costs['type'];
            $this->service->makeResourceWebBased($data);
        }

        if ($request->done) {
            $loan->is_done_submit = true;
            $loan->save();
        }
        
        return response()->apiReport(
            200,
            'Store Cost successfully',
            null,
        );
    }

    private function validateRequest($request)
    {
        if ($request->investment_costs) {
            $data =  $request->investment_costs;
            $type = CostStatus::getValue('INVESTMENT');
            return [
                "data" =>$data,
                'type' =>$type 
            ];
        } elseif ($request->monthly_costs) {
            $data =  $request->monthly_costs;
            $type = CostStatus::getValue('MONTHLY'); 
            return [
                "data" =>$data,
                'type' =>$type 
            ];
        }elseif($request->monthly_revenue) {
            $data =  $request->monthly_revenue;
            $type = CostStatus::getValue('MONTHLYREVEMT'); 
            return [
                "data" =>$data,
                'type' =>$type 
            ];        
        }else{
            return [
                'data' => []
            ];
        }
        
    }
    
}
