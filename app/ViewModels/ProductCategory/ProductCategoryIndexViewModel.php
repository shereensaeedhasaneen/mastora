<?php

namespace App\ViewModels\ProductCategory;

use Spatie\ViewModels\ViewModel;

class ProductCategoryIndexViewModel extends ViewModel
{

    public $productCategories;
    public $exportRoute;
    public $indexRoute;
    public $title;
    public $createRoute;
    public $createLinkTitle;

    /** 
     * ProductCategoryIndexViewModel constructor.
     * 
     * @param $productCategories
     */
    public function __construct($productCategories)
    {
        $this->productCategories = $productCategories;
        $this->exportRoute = route('product-categories.export');
        $this->indexRoute = route('product-categories.index');
        $this->title = __('main.product_category.all_countries.value');

        $this->createRoute = route('product-categories.create');
        $this->createLinkTitle = __('main.product_category.create_product_category.value');
    }

    /**
     * Elements of filter section.
     *
     * @return array
     */
    public function filterElements()
    {
        return [
            [
                'element' => 'input',
                'inputType' => 'text',
                'name' => 'filter[translation][title]',
                'value' => '',
                'label' => __('main.product_category.title.value'),
                'id' => 'title',
                'placeholder' => __('main.product_category.title.placeholder'),
                'wrapClasses' => 'form-group',
                'elementClasses' => 'form-control filter-input',
                'labelClasses' => 'form-label',
                'required' => false,
                'actionOneName' => '',
                'actionOneAttributes' => urlencode('{}'),
                'actionTwoName' => '',
                'actionTwoAttributes' => urlencode('{}'),
            ],
        ];
    }

    /**
     * Grid headers key => values.
     *
     * @return array
     */
    public function columnHeaders()
    {
        return [
            'title' => __('main.product_category.title.value'),
            'created_at' => __('main.common.created_at.value'),
            'actions' => __('main.common.actions.value'),
        ];
    }

    /**
     * Grid row cells key => values
     *
     * @return array
     */
    public function rows()
    {
        $rows = [];
        foreach ($this->productCategories as $key => $productCategory) {
            $cells = [];
            foreach ($this->columnHeaders() as $fieldName => $fieldValue) {
                if ($fieldName == 'actions') {
                    $cells[$fieldName] = $this->setCellActions($productCategory);
                    continue;
                }
                $cells[$fieldName] = $productCategory->{$fieldName};
            }
            $rows[$key + 1] = $cells;
        }
        return $rows;
    }

    /**
     * Set the value of actions
     *
     * @param $productCategory
     * @return $actionCell
     */
    private function setCellActions($productCategory)
    {
        $authenticatedUser = request()->user();
        $actionCell = [];

        $updateOneMine = config('privileges.resources_actions_permissions.product-categories.edit')[0];
        $updateOneTheirs = config('privileges.resources_actions_permissions.product-categories.edit')[1];
        $deleteOneMine = config('privileges.resources_actions_permissions.product-categories.destroy')[0];
        $deleteOneTheirs = config('privileges.resources_actions_permissions.product-categories.destroy')[1];

        if ($authenticatedUser->can($updateOneMine) || $authenticatedUser->can($updateOneTheirs)) {
            $actionCell[] =  [
                'title' => __('main.product_category.edit_product_category.value'),
                'url' => route('product-categories.edit', ['product_category' => $productCategory->id]),
                'dataToggle' => '',
                'dialogId' => '',
                'onClick' => '',
                'dialogTitle' => '',
                'dialogBody' => '',
            ];
        }

        if ($authenticatedUser->can($deleteOneMine) || $authenticatedUser->can($deleteOneTheirs)) {
            $actionCell[] =  [
                'title' => __('main.product_category.delete_product_category.value'),
                'url' => route('product-categories.destroy', ['product_category' => $productCategory->id]),
                'dataToggle' => 'modal',
                'dialogId' => 'delete-confirmation',
                'onClick' => 'event.preventDefault();',
                'dialogTitle' => __('main.common.delete_confirmation_title.value'),
                'dialogBody' => __('main.common.delete_confirmation_body.value') . 'Product Category: ' . $productCategory->title,
            ];
        }
        return $actionCell;
    }
}
