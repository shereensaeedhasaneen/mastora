<?php

namespace App\Http\Controllers\Web;

use App\Http\Middleware\Admin;
use App\Http\Requests\BankBranchRequest;
use App\Http\Resources\CreateResourceDialogResponseResource;
use App\Models\BankBranch;
use App\Services\BankBranchService;
use App\ViewModels\BankBranch\BankBranchFormViewModel;
use App\ViewModels\BankBranch\BankBranchIndexViewModel;
use Illuminate\Http\Request;

class BankBranchController extends AbstractController
{

    /**
     * Product Category Service
     *
     * @var \App\Services\BankBranchService 
     */
    protected $service;
    
    /**
     * Product Category constructor.
     *
     * @param \App\Services\BankBranchService $service
     */
    public function __construct(BankBranchService $service)
    {
        $this->service = $service;
        $this->entity = __('Product Category');
        $this->middleware('auth');
        $this->middleware(Admin::class);

    }

    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        session()->flashInput($request->input()); //to keep filter inputs has values
        $bankBranch = $this->service->retrieveResource($request->filter);
        return view('entities.bank-branch.index', new BankBranchIndexViewModel($bankBranch));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('entities.bank-branch.form', new BankBranchFormViewModel(
            $request->input('translation_language')
        ));
    }

    /**
     * Store a newly created resource in storage
     *
     * @param  \App\Http\Requests\BankBranchRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BankBranchRequest $request)
    {
        //dd($request->all());
        $bankBranch = $this->service->makeResourceWebBased($request->all());
        flash()->success(__('main.city.add_city_successfully.value'));
        return redirect()->action([BankBranchController::class, 'edit'], ['bank_branch' => $bankBranch]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BankBranch  $bankBranch
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, BankBranch $bankBranch)
    {
        //dd($bankBranch);
        return view(
            'entities.bank-branch.form',
            new BankBranchFormViewModel($request->input('translation-language'), $bankBranch)
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\BankBranchRequest   $request
     * @param  \App\Models\BankBranch  $bankBranch
     * @return \Illuminate\Http\Response
     */
    public function update(BankBranchRequest $request, BankBranch $bankBranch)
    {
        $bankBranch = $this->service->updateResourceWebBased($request->all(), $bankBranch);
        flash()->success(__('main.bank-branch.update_bank_branch_successfully.value'));
        return redirect()->action([BankBranchController::class, 'edit'], ['bank_branch' => $bankBranch]);
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BankBranch  $bankBranch
     * @return \Illuminate\Http\Response
     */
    public function destroy(BankBranch $bankBranch)
    {
        $this->service->deleteOneById($bankBranch->id);
        flash()->success(__('main.city.delete_city_successfully.value'));
        return redirect()->action([BankBranchController::class, 'index']);
    }

    /**
     * Create Product Categories AJAX.
     *
     * @param \App\Http\Requests\BankBranchRequest $request
     * @return \App\Http\Resources\CreateResourceDialogResponseResource
     */
    public function storeAjax(BankBranchRequest $request)
    {
        $bankBranch = $this->service->makeResource(fillingTranslation($request->all())['filling_translation']);
        return new CreateResourceDialogResponseResource([
            'id' => $bankBranch->id,
            'title' => $bankBranch->translate($request->input('translation_language'))->title
        ]);
    }

    /**
     * Update Product Categories AJAX.
     *
     * @param \App\Http\Requests\BankBranchRequest $request
     * @param \App\Models\BankBranch $bankBranch
     * @return \App\Http\Resources\CreateResourceDialogResponseResource
     */
    public function updateAjax(BankBranchRequest $request, BankBranch $bankBranch)
    {
        $bankBranch = $this->service->updateResource(
            fillingTranslation($request->all())['filling_translation'],
            $bankBranch
        );
        return new CreateResourceDialogResponseResource([
            'id' => $bankBranch->id,
            'title' => $bankBranch->translate($request->input('translation_language'))->title
        ]);
    }
}
