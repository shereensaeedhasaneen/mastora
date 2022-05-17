<?php

namespace App\Http\Controllers\ApiV2;

use App\Models\SocialResearch;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\SocialResearchService;
use App\Http\Controllers\Controller;
use App\Http\Requests\SocialResearchAditinalDataRequest;
use App\Http\Requests\SocialResearchRequest;
use App\Http\Resources\Loan\LoanResource;
use App\Http\Resources\SocialResearch\SocialResearchResource;
use App\Models\Loan;
use App\Services\Adapters\Fwmk\Api\FilteringSortingPagination\SocialResearch\IndexingRequest\RequestToRetrieveResourceInterface;

class SocialResearchController extends Controller
{

    /**
     * SocialResearch service.
     *
     * @var SocialResearchService
     */
    protected $service;

    /**
     * SocialResearch API Controller
     *
     * @param \App\Services\SocialResearchService $SocialResearchService
     */
    public function __construct(SocialResearchService $SocialResearchService)
    {
        $this->service = $SocialResearchService;
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
        $SocialResearchs = $this->service->retrieveResource(...$arguments);
        return response()->apiList(
            200,
            'Retrieve list of Social Researchs successfully',
            null,
            //SocialResearchResource::collection($SocialResearchs)
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SocialResearch;  $SocialResearch
     * @return \Illuminate\Http\Response
     */
    public function show(SocialResearch $socialResearch): Response
    {
        return response()->apiObject(
            200,
            'Retrieve SocialResearch #' . $socialResearch->id . ' successfully',
            null,
            //new SocialResearchResource($SocialResearch)
        );
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SocialResearch;  $SocialResearch
     * @return \Illuminate\Http\Response
     */
    public function store(SocialResearchRequest $request , Loan $loan)
    {   
        $data = $request->social_research;
        $data['loan_id'] =$loan->id;
        $data['house_needs'] = implode( '--' , $data['house_needs']);
        $data['furniture_description'] = implode( '--' ,  $data['furniture_description']);
        $this->service->makeResourceWebBased($data);
        if ($request->done) {
            $loan->is_done_submit = true;
            $loan->save();
        }
        return response()->apiObject(
            200,
            'Retrieve Loan successfully',
            null,
            new LoanResource($loan)
        );
    }
    
}
