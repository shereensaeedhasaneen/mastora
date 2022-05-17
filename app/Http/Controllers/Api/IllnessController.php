<?php

namespace App\Http\Controllers\Api;

use App\Models\Illness;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\IllnessService;
use App\Http\Controllers\Controller;
use App\Http\Requests\IllnessAditinalDataRequest;
use App\Http\Requests\IllnessRequest;
use App\Http\Resources\Illness\IllnessResource;
use App\Http\Resources\Loan\LoanResource;
use App\Models\Loan;
use App\Services\Adapters\Fwmk\Api\FilteringSortingPagination\Illness\IndexingRequest\RequestToRetrieveResourceInterface;

class IllnessController extends Controller
{

    /**
     * Illness service.
     *
     * @var IllnessService
     */
    protected $service;

    /**
     * Illness API Controller
     *
     * @param \App\Services\IllnessService $IllnessService
     */
    public function __construct(IllnessService $IllnessService)
    {
        $this->service = $IllnessService;
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
        $Illnesss = $this->service->retrieveResource(...$arguments);
        return response()->apiList(
            200,
            'Retrieve list of Illnesss successfully',
            null,
            //IllnessResource::collection($Illnesss)
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Illness;  $Illness
     * @return \Illuminate\Http\Response
     */
    public function show(Illness $Illness): Response
    {
        return response()->apiObject(
            200,
            //'Retrieve Illness #' . $Cost->id . ' successfully',
            null,
            //new IllnessResource($Cost)
        );
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Illness;  $Illness
     * @return \Illuminate\Http\Response
     */
    public function store(IllnessRequest $request , Loan $loan)
    {   
        //return $request;
        $Illnesses = $request->illness;
        //$Illnesses = json_decode($Illnesses);
        foreach ($Illnesses as $illness) {
            $data = $illness;
            $data['loan_id'] = $loan->id;
            $data['translation_language'] = "en";
            $this->service->makeResourceWebBased($data);
        }
       
        return response()->apiObject(
            200,
            'Retrieve new Loan # successfully',
            null,
            new LoanResource($loan)
        );
    }
    
}
