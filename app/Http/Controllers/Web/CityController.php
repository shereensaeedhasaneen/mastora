<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\CityRequest;
use App\Http\Resources\CreateResourceDialogResponseResource;
use App\Models\City;
use App\Services\CityService;
use App\ViewModels\City\CityFormViewModel;
use App\ViewModels\City\CityIndexViewModel;
use Illuminate\Http\Request;

class CityController extends AbstractController
{

    /**
     * Product Category Service
     *
     * @var \App\Services\CityService 
     */
    protected $service;
    
    /**
     * Product Category constructor.
     *
     * @param \App\Services\CityService $service
     */
    public function __construct(CityService $service)
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

        $city = $this->service->retrieveResource($request->filter);
        return view('entities.cities.index', new CityIndexViewModel($city));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('entities.cities.form', new CityFormViewModel(
            $request->input('translation_language')
        ));
    }

    /**
     * Store a newly created resource in storage
     *
     * @param  \App\Http\Requests\CityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
        $city = $this->service->makeResourceWebBased($request->all());
        flash()->success(__('main.city.add_city_successfully.value'));
        return redirect()->action([CityController::class, 'edit'], ['city' => $city]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, City $city)
    {
        return view(
            'entities.cities.form',
            new CityFormViewModel($request->input('translation-language'), $city)
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CityRequest   $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(CityRequest $request, City $city)
    {
        $city = $this->service->updateResourceWebBased($request->all(), $city);
        flash()->success(__('main.city.update_city_successfully.value'));
        return redirect()->action([CityController::class, 'edit'], ['city' => $city]);
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $this->service->deleteOneById($city->id);
        flash()->success(__('main.city.delete_city_successfully.value'));
        return redirect()->action([CityController::class, 'index']);
    }

    /**
     * Create Product Categories AJAX.
     *
     * @param \App\Http\Requests\CityRequest $request
     * @return \App\Http\Resources\CreateResourceDialogResponseResource
     */
    public function storeAjax(CityRequest $request)
    {
        $city = $this->service->makeResource(fillingTranslation($request->all())['filling_translation']);
        return new CreateResourceDialogResponseResource([
            'id' => $city->id,
            'title' => $city->translate($request->input('translation_language'))->title
        ]);
    }

    /**
     * Update Product Categories AJAX.
     *
     * @param \App\Http\Requests\CityRequest $request
     * @param \App\Models\City $city
     * @return \App\Http\Resources\CreateResourceDialogResponseResource
     */
    public function updateAjax(CityRequest $request, City $city)
    {
        $city = $this->service->updateResource(
            fillingTranslation($request->all())['filling_translation'],
            $city
        );
        return new CreateResourceDialogResponseResource([
            'id' => $city->id,
            'title' => $city->translate($request->input('translation_language'))->title
        ]);
    }
}
