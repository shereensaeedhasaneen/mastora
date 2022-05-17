<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\ProductCategoryRequest;
use App\Http\Resources\CreateResourceDialogResponseResource;
use App\Models\ProductCategory;
use App\Services\ProductCategoryService;
use App\ViewModels\ProductCategory\ProductCategoryFormViewModel;
use App\ViewModels\ProductCategory\ProductCategoryIndexViewModel;
use Illuminate\Http\Request;

class ProductCategoryController extends AbstractController
{

    /**
     * Product Category Service
     *
     * @var \App\Services\ProductCategoryService 
     */
    protected $service;
    
    /**
     * Product Category constructor.
     *
     * @param \App\Services\ProductCategoryService $service
     */
    public function __construct(ProductCategoryService $service)
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

        $productCategory = $this->service->retrieveResource($request->filter);
        return view('entities.product-categories.index', new ProductCategoryIndexViewModel($productCategory));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('entities.product-categories.form', new ProductCategoryFormViewModel(
            $request->input('translation_language')
        ));
    }

    /**
     * Store a newly created resource in storage
     *
     * @param  \App\Http\Requests\ProductCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCategoryRequest $request)
    {
        $productCategory = $this->service->makeResourceWebBased($request->all());
        flash()->success(__('main.product_category.add_product_category_successfully.value'));
        return redirect()->action([ProductCategoryController::class, 'edit'], ['product_category' => $productCategory]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ProductCategory $productCategory)
    {
        return view(
            'entities.product-categories.form',
            new ProductCategoryFormViewModel($request->input('translation-language'), $productCategory)
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ProductCategoryRequest   $request
     * @param  \App\Models\productCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(ProductCategoryRequest $request, ProductCategory $productCategory)
    {
        $productCategory = $this->service->updateResourceWebBased($request->all(), $productCategory);
        flash()->success(__('main.product_category.update_product_category_successfully.value'));
        return redirect()->action([ProductCategoryController::class, 'edit'], ['product_category' => $productCategory]);
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productCategory)
    {
        $this->service->deleteOneById($productCategory->id);
        flash()->success(__('main.product_category.delete_product_category_successfully.value'));
        return redirect()->action([ProductCategoryController::class, 'index']);
    }

    /**
     * Create Product Categories AJAX.
     *
     * @param \App\Http\Requests\ProductCategoryRequest $request
     * @return \App\Http\Resources\CreateResourceDialogResponseResource
     */
    public function storeAjax(ProductCategoryRequest $request)
    {
        $productCategory = $this->service->makeResource(fillingTranslation($request->all())['filling_translation']);
        return new CreateResourceDialogResponseResource([
            'id' => $productCategory->id,
            'title' => $productCategory->translate($request->input('translation_language'))->title
        ]);
    }

    /**
     * Update Product Categories AJAX.
     *
     * @param \App\Http\Requests\ProductCategoryRequest $request
     * @param \App\Models\ProductCategory $productCategory
     * @return \App\Http\Resources\CreateResourceDialogResponseResource
     */
    public function updateAjax(ProductCategoryRequest $request, ProductCategory $productCategory)
    {
        $productCategory = $this->service->updateResource(
            fillingTranslation($request->all())['filling_translation'],
            $productCategory
        );
        return new CreateResourceDialogResponseResource([
            'id' => $productCategory->id,
            'title' => $productCategory->translate($request->input('translation_language'))->title
        ]);
    }
}
