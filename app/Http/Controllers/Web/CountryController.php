<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\CountryRequest;
use App\Http\Resources\CreateResourceDialogResponseResource;
use App\Models\Country;
use App\Services\CountryService;
use App\ViewModels\Country\CountryFormViewModel;
use App\ViewModels\Country\CountryIndexViewModel;
use Illuminate\Http\Request;

class CountryController extends AbstractController
{

    /**
     * Product Category Service
     *
     * @var \App\Services\CountryService 
     */
    protected $service;
    
    /**
     * Product Category constructor.
     *
     * @param \App\Services\CountryService $service
     */
    public function __construct(CountryService $service)
    {
        $this->service = $service;
        $this->entity = __('Product Category');
        $this->middleware('auth');
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

        $country = $this->service->retrieveResource($request->filter);
        return view('entities.countries.index', new CountryIndexViewModel($country));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('entities.countries.form', new CountryFormViewModel(
            $request->input('translation_language')
        ));
    }

    /**
     * Store a newly created resource in storage
     *
     * @param  \App\Http\Requests\CountryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryRequest $request)
    {
        $country = $this->service->makeResourceWebBased($request->all());
        flash()->success(__('main.country.add_country_successfully.value'));
        return redirect()->action([CountryController::class, 'edit'], ['country' => $country]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Country $country)
    {
        return view(
            'entities.countries.form',
            new CountryFormViewModel($request->input('translation-language'), $country)
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CountryRequest   $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(CountryRequest $request, Country $country)
    {
        $country = $this->service->updateResourceWebBased($request->all(), $country);
        flash()->success(__('main.country.update_country_successfully.value'));
        return redirect()->action([CountryController::class, 'edit'], ['country' => $country]);
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $this->service->deleteOneById($country->id);
        flash()->success(__('main.country.delete_country_successfully.value'));
        return redirect()->action([CountryController::class, 'index']);
    }

    /**
     * Create Product Categories AJAX.
     *
     * @param \App\Http\Requests\CountryRequest $request
     * @return \App\Http\Resources\CreateResourceDialogResponseResource
     */
    public function storeAjax(CountryRequest $request)
    {
        $country = $this->service->makeResource(fillingTranslation($request->all())['filling_translation']);
        return new CreateResourceDialogResponseResource([
            'id' => $country->id,
            'title' => $country->translate($request->input('translation_language'))->title
        ]);
    }

    /**
     * Update Product Categories AJAX.
     *
     * @param \App\Http\Requests\CountryRequest $request
     * @param \App\Models\Country $country
     * @return \App\Http\Resources\CreateResourceDialogResponseResource
     */
    public function updateAjax(CountryRequest $request, Country $country)
    {
        $country = $this->service->updateResource(
            fillingTranslation($request->all())['filling_translation'],
            $country
        );
        return new CreateResourceDialogResponseResource([
            'id' => $country->id,
            'title' => $country->translate($request->input('translation_language'))->title
        ]);
    }
}
