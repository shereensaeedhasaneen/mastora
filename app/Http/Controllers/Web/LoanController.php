<?php

namespace App\Http\Controllers\Web;

use App\Enums\LoanStatus;
use App\Enums\UserType;
use App\Http\Requests\AdditionalFileRequest;
use App\Http\Requests\LoanRequest;
use App\Http\Requests\UpdatePartial;
use App\Http\Requests\UploadRequest;
use App\Http\Resources\CreateResourceDialogResponseResource;
use App\Http\Resources\Loan\LoanFormResource;
use App\Http\Resources\Loan\LoanResource;
use App\Models\AdditionalFile;
use App\Models\BankBranch;
use App\Models\Country;
use App\Models\Loan;
use App\Models\LoanUserStatus;
use App\Models\User;
use App\Services\Adapters\Fwmk\Api\FilteringSortingPagination\Loan\IndexingRequest\RequestToRetrieveResourceInterface;
use App\Services\LoanService;
use Carbon\Carbon;
use DOMDocument;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use SimpleXMLElement;
use SoapClient;
use SoapHeader;
use SoapServer;

class LoanController extends AbstractController
{

    /**
     * Loan Service
     *
     * @var \App\Services\LoanService
     */
    protected $service;

    /**
     * Loan constructor.
     *
     * @param \App\Services\LoanService $service
     */
    public function __construct(LoanService $service)
    {
        $this->service = $service;
        $this->entity = __('Loan');
        $this->middleware('auth');
    }

    public function csrfReload(Loan $loan)
    {
        $status = $loan->status+1;
        switch (auth()->user()->user_type) {
            case UserType::getValue('ACCOUNTMANGER'):
                $status =  LoanStatus::getValue('BRANCHREVIEW');
                break;
            case UserType::getValue('PARTNER'):
                $status = LoanStatus::getValue('PARTNERREVIEW');
                break;
            case UserType::getValue('BRANCHMANGER'):
                $status = LoanStatus::getValue('CREDITBRANCH')  ;
                break;
            case UserType::getValue('CENTERMANGER') :
                $status = LoanStatus::getValue('CENTERBRANCH')  ;
                break;
        }
        //dd(UserType::getValue('CENTERMANGER'));
        $newLoan = $loan;
        $newLoan->status = $status+1;
        $loan->save();
        $this->updateStatus( ['status' => 'APPROVED'] , $loan);
        return redirect()->route('loans.index');
    }
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Request
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request , RequestToRetrieveResourceInterface $requestToRetrieveResourceAdapter)
    {
        $arguments = $requestToRetrieveResourceAdapter->convert($request);
        session()->flashInput($request->input()); //to keep filter inputs has values
        $loans = $this->service->retrieveResource(...$arguments);
        $partners = User::where('user_type' ,1  )->get();
        return view('entities.mastora.index' , compact('loans' , 'partners') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $xmlString = file_get_contents(public_path('appl_loan.xml'));
        $xmlObject = simplexml_load_string($xmlString);
        $xmlObject->saveXML("loan_1");
        // return view('entities.product-categories.form', new LoanFormViewModel(
        //     $request->input('translation_language')
        // ));
    }

    public function show(Loan $loan)
    {

        $reserchers = User::where('user_type' ,4  )->get();
        $costs = $loan->costs->groupBy('type');
        $partners = User::where('user_type' ,1  )->get();
        $accounters = User::where('user_type' ,0  )->get();
        $canEdit = false;
        $status = LoanUserStatus::where(['user_id' => auth()->user()->id , 'loan_id' => $loan->id ])->first();
        if (!$status || (auth()->user()->user_type == 2 && $loan->status == 4)) {
            $canEdit = true;
        }
        return view('entities.mastora.show')->with('loan' , $loan)->with('canEdit' , $canEdit)->with('reserchers' , $reserchers)->with('costs' , $costs)->with('partners' , $partners )->with('accounters' , $accounters) ;
    }
    /**
     * Store a newly created resource in storage
     *
     * @param  \App\Http\Requests\LoanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoanRequest $request)
    {
        $data = $request->all();
        $data['status']  = 1;
        //dd($data);
        $loan = $this->service->makeResourceWebBased($data);

        return new LoanFormResource($loan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Loan $loan)
    {
        return User::all();
        // return view(
        //     'entities.product-categories.form',
        //     new LoanFormViewModel($request->input('translation-language'), $loan)
        // );
    }

    public function bankBranches(Country $country)
    {
        return response()->json(
            [
                "banks" =>$country->banks
            ]
        ); 
    }
    public function cities(Country $country)
    {
        return response()->json(
            [
                "cities" =>$country->cities
            ]
        ); 
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\LoanRequest   $request
     * @param  \App\Models\loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function update(LoanRequest $request, Loan $loan)
    {
        $loan = $this->service->updateResourceWebBased($request->all(), $loan);

        if(!count($loan->userPartners) && $request->user_partner_name && $request->user_partner_name[0] ){
            foreach ($request->user_partner_name as $key => $value) {
                $data = [
                    "name" =>  $request->user_partner_name[$key],
                    'national_id' => $request->user_partner_nationlid[$key],
                    'loan_id' => $loan->id
                ];
                $loan->userPartners()->create($data);
            }
        }

        if($request->ajax()){
            return new LoanFormResource($loan);
        }
        return redirect()->back();
    }
    
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\LoanRequest   $request
     * @param  \App\Models\loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function updatePartial(UpdatePartial $request, Loan $loan)
    {
        $loan = $this->service->updateResourceWebBased($request->all(), $loan);

        if(!count($loan->userPartners) && $request->user_partner_name && $request->user_partner_name[0] ){
            foreach ($request->user_partner_name as $key => $value) {
                $data = [
                    "name" =>  $request->user_partner_name[$key],
                    'national_id' => $request->user_partner_nationlid[$key],
                    'loan_id' => $loan->id
                ];
                $loan->userPartners()->create($data);
            }
        }

        if($request->ajax()){
            return response($loan, 200);
        }
        return redirect()->back()->with('success' , 'done');
    }

    public function updateStatusReject(Request $request , Loan $loan)  
    {
        $loan->status = 0;
        $loan->save();
        $this->updateStatus( ['status' => 'REJECTED' , 'notes' => $request->notes] , $loan);
        return redirect()->back();

    }
    
    public function updateStatusAssigned(Request $request , Loan $loan)  
    {
        $loan->status = 2;
        $loan->assigned_id = $request->assigned_id;
        $loan->save();
        $this->updateStatus( ['status' => 'ASSIGNED' , 'notes' => $request->notes] , $loan);
        return redirect()->back();

    }


    public function assignPatener(Request $request , Loan $loan)  
    {
        $request->validate([
            'partner_id' => 'required'
        ]);
        $loan->status = 3;
        $loan->partner_id = $request->partner_id;
        $loan->save();
        $this->updateStatus( ['status' => 'APPROVED'] , $loan);
        return redirect()->to('/')->with('success' , 'تمت الموافقه على الطلب');

    }

    private function handelFiles(Request $request , $file )
    {
        
        $fileName = auth()->id() ."_" . $file . '_' . time() . '.'. $request->$file->extension();
        //dd($fileName , $file);
        $request->$file->move(public_path('file'), $fileName);
        return $fileName;
        
    }
    
    private function handelAdditionalFiles( $file , $key , $loan )
    {
        //dd($file->extension());
        $additionFile = new AdditionalFile;
        $additionFile->loan_id = $loan->id;
        $fileName = auth()->id() ."_" . $key . '_' . time() . '.'. $file->extension();
        $file->move(public_path('file'), $fileName);
        $additionFile->file_name = $fileName;
        $additionFile->stored_path = $fileName;
        $additionFile->save();

        
        
    }

    private function updateStatus($data, Loan $loan)
    {
        $this->service->updateStatus(auth()->id() , $data , $loan);
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loan $loan)
    {
        $this->service->deleteOneById($loan->id);
        flash()->success(__('main.product_category.delete_product_category_successfully.value'));
        return redirect()->action([LoanController::class, 'index']);
    }

    /**
     * Create Loans AJAX.
     *
     * @param \App\Http\Requests\LoanRequest $request
     * @return \App\Http\Resources\CreateResourceDialogResponseResource
     */
    public function storeAjax(LoanRequest $request)
    {
        $loan = $this->service->makeResource(fillingTranslation($request->all())['filling_translation']);
        return new CreateResourceDialogResponseResource([
            'id' => $loan->id,
            'title' => $loan->translate($request->input('translation_language'))->title
        ]);
    }

    /**
     * Update Loans AJAX.
     *
     * @param \App\Http\Requests\LoanRequest $request
     * @param \App\Models\Loan $loan
     * @return \App\Http\Resources\CreateResourceDialogResponseResource
     */
    public function updateAjax(LoanRequest $request, Loan $loan)
    {
        $loan = $this->service->updateResource(
            fillingTranslation($request->all())['filling_translation'],
            $loan
        );
        return new CreateResourceDialogResponseResource([
            'id' => $loan->id,
            'title' => $loan->translate($request->input('translation_language'))->title
        ]);
    }

    public function upload(UploadRequest $request , Loan $loan)
    {
        if($request->hasFile('national_id_front_file')){
            $national_id_front_file = $this->handelFiles($request ,'national_id_front_file' );
        }
        
        if($request->hasFile('national_id_end_file')){
            $national_id_end_file = $this->handelFiles($request ,'national_id_end_file' );
        }

        if($request->hasFile('home_service_file')){
            $home_service_file = $this->handelFiles($request  , 'home_service_file' );
        }

        if($request->hasFile('rent_file')){
            $rent_file = $this->handelFiles($request   , 'rent_file');
        } 

        if($request->hasFile('price_file')){
            $price_file = $this->handelFiles($request  , 'price_file');
        }

        if($request->hasFile('partner_file')){
            $partner_file =$this->handelFiles($request  ,'partner_file' );
        }
        $loanArray = $loan->toArray();
        $loanArray['national_id_front_file'] = $national_id_front_file;
        $loanArray['national_id_end_file'] = $national_id_end_file;
        $loanArray['home_service_file'] = $home_service_file;
        $loanArray['rent_file'] = $rent_file;
        $loanArray['price_file'] = $price_file;
        $loanArray['partner_file'] = $partner_file;
        $loanArray['status'] = 2;
        $loan->update($loanArray);
        return new LoanFormResource($loan);

    }

    public function showForm()
    {
        $countries = Country::all();
        $branches = BankBranch::all();

        return view('entities.mastora.form')->with( 'countries' , $countries )->with('branches' ,$branches);
    }

    public function deleteAdditionalFiles($id)
    {
        $file =AdditionalFile::find($id);
        $file->delete();
        return redirect()->back();
    }

    public function additionalFiles(Request $request ,  $id)
    {
        
        $loan = Loan::find($id);
        $loanArray = $loan->toArray();
        if($request->hasFile('national_id_front_file')){
            $national_id_front_file = $this->handelFiles($request ,'national_id_front_file' );
            $loanArray['national_id_front_file'] = $national_id_front_file;

        }

        if($request->hasFile('national_id_end_file')){
            $national_id_end_file = $this->handelFiles($request ,'national_id_end_file' );
            $loanArray['national_id_end_file'] = $national_id_end_file;

        }

        if($request->hasFile('home_service_file')){
            $home_service_file = $this->handelFiles($request  , 'home_service_file' );
            $loanArray['home_service_file'] = $home_service_file;

        }

        if($request->hasFile('rent_file')){
            $rent_file = $this->handelFiles($request   , 'rent_file');
            $loanArray['rent_file'] = $rent_file;

        } 

        if($request->hasFile('price_file')){
            $price_file = $this->handelFiles($request  , 'price_file');
            $loanArray['price_file'] = $price_file;

        }

        if($request->hasFile('partner_file')){
            $partner_file =$this->handelFiles($request  ,'partner_file' );
            $loanArray['partner_file'] = $partner_file;

        }

        if($request->additionalFiles){
            //dd($request->additionalFiles);
            foreach ($request->additionalFiles as $key =>  $value) {
                //dd( $value);
                $partner_file =$this->handelAdditionalFiles($value , $key , $loan  );
                $loanArray['partner_file'] = $partner_file;
            }
        }
        //dd($loan);
        
        $loan->update($loanArray);

        return redirect()->back();
    }

    // public function sendXml()
    // {

    //     $xmlString = file_get_contents(public_path('appl_loan.xml'));
    //     $xmlObject = simplexml_load_string($xmlString);
    //     $xmlObject->application_type = "بنتي";
    //     dd($xmlObject);
    //     $xmlObject->saveXML("loan_1");

    //     $counter = 0;
    //     $variable = [];
    //     $variable[$counter] = new \stdClass();
    //     $xmlFile = "Appl_loans.xml";
    //     $xml = new \XMLReader();
    //     $xml->open($xmlFile);
    //     $address = $xml->getAttribute('application_type');

    
    //     $doc = new DOMDocument();

    //     // move to the first <product /> node
    //     while ($xml->read() && $xml->name !== 'application');

    //     // now that we're at the right depth, hop to the next <product/> until the end of the tree
    //     while ($xml->name !== 'cst_id_card_1')
    //     {
    //         // either one should work
    //         //$node = new SimpleXMLElement($xml->readOuterXML());
    //         try{
    //             $node = simplexml_import_dom($doc->importNode($xml->expand(), true));
    //         }catch(Exception $e){
    //             dd($doc);
    //         }

    //         // now you can use $node without going insane about parsing
    //         //dd($node->element_1);

    //         // go to next <product />
    //         $xml->next();
    //     }
    //         dd($doc);
    //         try {
    //             while ($xml->read()) {
    //                 if ($xml->nodeType == \XMLReader::ELEMENT) {
    //                     $address = $xml->getAttribute('application_type');
    //                     dd($address);
    //                     //assuming the values you're looking for are for each "item" element as an example
    //                     if ($xml->name == 'item') {
    //                         $variable[++$counter] = new \stdClass();
    //                         $variable[$counter]->thevalueyouwanttoget = '';
    //                     }
    //                     if ($xml->name == 'thevalueyouwanttoget') {
    //                         $variable[$counter]->thevalueyouwanttoget = $xml->readString();
    //                     }
    //                 }
    //             }
    //         } catch (Exception $e) {
    //             dd($e);
    //         } 

    //             $xmlString = file_get_contents(public_path("Appl_loans.xml"));
                
    //             $string = trim(preg_replace('/\s\s+/', ' ', $xmlString));

    //             dd($xmlString , $string);
    //             $xml = simplexml_load_string($string);
    //             dd($xml);
    //             $json = json_encode($xml);
    //             $array = json_decode($json,TRUE);
    //             dd($array);
    //             //phpinfo();
    //             //$client = new \SoapClient("ds", ['url' => "dsd"]);
    //             //Http::post('')
    //             $opts = array(
    //                 'http' => array(
    //                     'user_agent' => 'PHPSoapClient'
    //                 )
    //             );
    //             $context = stream_context_create($opts);

    //             $wsdlUrl = 'http://ec.europa.eu/taxation_customs/vies/checkVatService.wsdl';
    //             $soapClientOptions = array(
    //                 'stream_context' => $context,
    //                 'cache_wsdl' => WSDL_CACHE_NONE
    //             );

    //             $xml = simplexml_load_string($xml_string);
    //             $json = json_encode($xml);
    //             $array = json_decode($json,TRUE);

    //             $client = new SoapClient($wsdlUrl, $soapClientOptions);

    //             $checkVatParameters = array(
    //                 'countryCode' => 'DK',
    //                 'vatNumber' => '47458714'
    //             );

    //             $result = $client->checkVat($checkVatParameters);
    //             print_r($result);
    //             $server = new SoapServer(NULL , ['uri' => 'test']);
    // }

}
