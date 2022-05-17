<?php

namespace App\Http\Controllers\ApiV2;

use App\Models\FieldInquiry;
use Illuminate\Http\Response;
use App\Services\FieldInquiryService;
use App\Http\Controllers\Controller;
use App\Http\Requests\FieldInquiryRequest;
use App\Http\Resources\Loan\LoanResource;
use App\Models\Loan;

class FieldInquiryController extends Controller
{

    /**
     * FieldInquiry service.
     *
     * @var FieldInquiryService
     */
    protected $service;

    /**
     * FieldInquiry API Controller
     *
     * @param \App\Services\FieldInquiryService $FieldInquiryService
     */
    public function __construct(FieldInquiryService $FieldInquiryService)
    {
        $this->service = $FieldInquiryService;
        $this->middleware('auth:api')->except(['show' ,'store' ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FieldInquiry;  $FieldInquiry
     * @return \Illuminate\Http\Response
     */
    public function show(FieldInquiry $FieldInquiry): Response
    {
        return response()->apiObject(
            200,
            'Retrieve FieldInquiry #' . $FieldInquiry->id . ' successfully',
            null,
            //new FieldInquiryResource($FieldInquiry)
        );
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FieldInquiry;  $FieldInquiry
     * @return \Illuminate\Http\Response
     */
    public function store(FieldInquiryRequest $request , Loan $loan)
    {   
        $data = $request->field_inquiry;
        $data['loan_id'] =$loan->id;
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
