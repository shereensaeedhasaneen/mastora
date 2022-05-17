<?php

namespace App\Http\Controllers\Web;

use App\Enums\UserType;
use App\Http\Requests\PartnerRequest;
use App\Http\Resources\CreateResourceDialogResponseResource;
use App\Models\BankBranch;
use App\Models\Country;
use App\Models\Loan;
use App\Models\User;
use App\Services\Adapters\Fwmk\Api\FilteringSortingPagination\Loan\IndexingRequest\RequestToRetrieveResourceInterface;
use App\Services\UserService;
use Illuminate\Http\Request;

class PartenerController extends AbstractController
{

    /**
     * Loan Service
     *
     * @var \App\Services\UserService
     */
    protected $service;

    /**
     * Loan constructor.
     *
     * @param \App\Services\UserService $service
     */
    public function __construct(UserService $service)
    {
        $this->service = $service;
        $this->entity = __('Loan');
        $this->middleware('auth');
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Request
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request , RequestToRetrieveResourceInterface $requestToRetrieveResourceAdapter)
    {
        //$users = User::where('user_type' , UserType::getValue('PARTNER'))->get();
        $branches = BankBranch::all();
        $partners = User::where('user_type' ,1  )->get();
        return view('entities.mastora.partners' , compact('partners') )->with('branches' ,$branches);
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Request
    * @return \Illuminate\Http\Response
    */
    public function partners(Request $request , RequestToRetrieveResourceInterface $requestToRetrieveResourceAdapter)
    {
        $users = User::where('user_type' , UserType::getValue('PARTNER'))->get();
        return view('entities.mastora.partners' )->with('users' , $users);
    }
    
    public function search(Request $request , RequestToRetrieveResourceInterface $requestToRetrieveResourceAdapter)
    {
        $partners = User::where('user_type' , UserType::getValue('PARTNER'))->where( 'name' ,  'like', '%' . $request->input('name') . '%')->get();
        $branches = BankBranch::all();
        return view('entities.mastora.partners' )->with('partners' , $partners)->with('branches' ,$branches);
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // return view('entities.product-categories.form', new LoanFormViewModel(
        //     $request->input('translation_language')
        // ));
    }

    public function show(Loan $partener)
    {

        $users = User::all();
        $costs = $partener->costs->groupBy('type');
        return view('entities.mastora.show')->with('partener' , $partener)->with('users' , $users)->with('costs' , $costs);
    }

    public function showAjax($partener)
    {

        $user = User::find($partener);
        //$costs = $partener->costs->groupBy('type');
        //return view('entities.mastora.show')->with('partener' , $partener)->with('users' , $users)->with('costs' , $costs);
        return response($user, 200);
        
    }
    /**
     * Store a newly created resource in storage
     *
     * @param  \App\Http\Requests\PartnerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PartnerRequest $request)
    {
        //dd($request);
        $data = $request->all();
        $data['password'] = "12341234";
        $data['user_type'] = UserType::getValue('PARTNER');
        //$date['bank_branch_id'] = auth()->user()->bank->id;
        $this->service->makeResourceWebBased($data);
        
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Loan  $partener
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Loan $partener)
    {
        return User::all();
        // return view(
        //     'entities.product-categories.form',
        //     new LoanFormViewModel($request->input('translation-language'), $partener)
        // );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PartnerRequest   $request
     * @param  \App\Models\User  $partener
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $partener = User::find($id);
        $data = $request->all();
        $this->service->updateResourceWebBased($data , $partener);
        
        return redirect()->back();

        if($request->ajax()){
            return response($partener, 200);
        }
        return redirect()->back();
    }

    private function saveFiles(Request $request , $file)
    {
        if($request->hasFile($file)){
            $fileName = auth()->id() . '_' . time() . '.'. $request->$file->extension();
            $request->file->move(public_path('file'), $fileName);
            $request->national_id_file =$fileName;
        }
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Loan  $partener
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loan $partener)
    {
        $this->service->deleteOneById($partener->id);
        flash()->success(__('main.product_category.delete_product_category_successfully.value'));
        return redirect()->action([LoanController::class, 'index']);
    }

    /**
     * Create Loans AJAX.
     *
     * @param \App\Http\Requests\PartnerRequest $request
     * @return \App\Http\Resources\CreateResourceDialogResponseResource
     */
    public function storeAjax(PartnerRequest $request)
    {
        $partener = $this->service->makeResource(fillingTranslation($request->all())['filling_translation']);
        return new CreateResourceDialogResponseResource([
            'id' => $partener->id,
            'title' => $partener->translate($request->input('translation_language'))->title
        ]);
    }

    /**
     * Update Loans AJAX.
     *
     * @param \App\Http\Requests\PartnerRequest $request
     * @param \App\Models\Loan $partener
     * @return \App\Http\Resources\CreateResourceDialogResponseResource
     */
    public function updateAjax(PartnerRequest $request, Loan $partener)
    {
        $partener = $this->service->updateResource(
            fillingTranslation($request->all())['filling_translation'],
            $partener
        );
        return new CreateResourceDialogResponseResource([
            'id' => $partener->id,
            'title' => $partener->translate($request->input('translation_language'))->title
        ]);
    }

    public function showForm()
    {
        $countries = Country::all();
        $branches = BankBranch::all();

        return view('entities.mastora.form')->with( 'countries' , $countries )->with('branches' ,$branches);
    }

}
