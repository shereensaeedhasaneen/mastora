<?php

namespace App\Http\Controllers\ApiV2;

use App\Models\Relative;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\RelativeService;
use App\Http\Controllers\Controller;
use App\Http\Requests\RelativeAditinalDataRequest;
use App\Http\Requests\RelativeRequest;
use App\Http\Resources\Loan\LoanResource;
use App\Http\Resources\Relative\RelativeResource;
use App\Models\Loan;
use App\Services\Adapters\Fwmk\Api\FilteringSortingPagination\Relative\IndexingRequest\RequestToRetrieveResourceInterface;

class RelativeController extends Controller
{

    /**
     * Relative service.
     *
     * @var RelativeService
     */
    protected $service;

    /**
     * Relative API Controller
     *
     * @param \App\Services\RelativeService $RelativeService
     */
    public function __construct(RelativeService $RelativeService)
    {
        $this->service = $RelativeService;
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
        $Relatives = $this->service->retrieveResource(...$arguments);
        return response()->apiList(
            200,
            'Retrieve list of Relatives successfully',
            null,
            //RelativeResource::collection($Relatives)
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Relative;  $Relative
     * @return \Illuminate\Http\Response
     */
    public function show(Relative $Relative): Response
    {
        return response()->apiObject(
            200,
            'Retrieve Relative #' . $Relative->id . ' successfully',
            null,
            //new RelativeResource($Relative)
        );
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Relative;  $Relative
     * @return \Illuminate\Http\Response
     */
    public function store(RelativeRequest $request , Loan $loan)
    {
        
        $Relatives = $request->family_info;
        foreach ($Relatives as $family_info) {
            $data = $family_info;
            $data['loan_id'] = $loan->id;
            $this->service->makeResourceWebBased($data);
        }

        if ($request->done) {
            $loan->is_done_submit = true;
            $loan->save();
        }
       
        return response()->apiObject(
            200,
            'Retrieve new Loan # successfully',
            null,
            new LoanResource($loan)
        );
    }
    
}
