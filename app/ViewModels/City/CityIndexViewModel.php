<?php

namespace App\ViewModels\City;

use Spatie\ViewModels\ViewModel;

class CityIndexViewModel extends ViewModel
{

    public $productCategories;
    public $exportRoute;
    public $indexRoute;
    public $title;
    public $createRoute;
    public $createLinkTitle;

    /** 
     * CityIndexViewModel constructor.
     * 
     * @param $productCategories
     */
    public function __construct($productCategories)
    {
        $this->productCategories = $productCategories;
        $this->exportRoute = route('cities.export');
        $this->indexRoute = route('cities.index');
        $this->title = __('main.city.all_cities.value');

        $this->createRoute = route('cities.create');
        $this->createLinkTitle = __('main.city.create_city.value');
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
                'name' => 'filter[translation][name]',
                'value' => '',
                'label' => __('main.city.name.value'),
                'id' => 'title',
                'placeholder' => __('main.city.name.placeholder'),
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
            'name' => __('main.city.name.value'),
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

        $updateOneMine = config('privileges.resources_actions_permissions.cities.edit')[0];
        $updateOneTheirs = config('privileges.resources_actions_permissions.cities.edit')[1];
        $deleteOneMine = config('privileges.resources_actions_permissions.cities.destroy')[0];
        $deleteOneTheirs = config('privileges.resources_actions_permissions.cities.destroy')[1];

        if ($authenticatedUser->can($updateOneMine) || $authenticatedUser->can($updateOneTheirs)) {
            $actionCell[] =  [
                'title' => __('main.city.edit_city.value'),
                'url' => route('cities.edit', ['city' => $productCategory->id]),
                'dataToggle' => '',
                'dialogId' => '',
                'onClick' => '',
                'dialogTitle' => '',
                'dialogBody' => '',
            ];
        }

        if ($authenticatedUser->can($deleteOneMine) || $authenticatedUser->can($deleteOneTheirs)) {
            $actionCell[] =  [
                'title' => __('main.city.delete_city.value'),
                'url' => route('cities.destroy', ['city' => $productCategory->id]),
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
