<?php

namespace App\ViewModels\Country;

use Spatie\ViewModels\ViewModel;

class CountryIndexViewModel extends ViewModel
{

    public $countries;
    public $exportRoute;
    public $indexRoute;
    public $title;
    public $createRoute;
    public $createLinkTitle;

    /** 
     * CountryIndexViewModel constructor.
     * 
     * @param $countries
     */
    public function __construct($countries)
    {
        $this->countries = $countries;
        $this->exportRoute = route('countries.export');
        $this->indexRoute = route('countries.index');
        $this->title = __('main.country.all_countries.value');

        $this->createRoute = route('countries.create');
        $this->createLinkTitle = __('main.country.create_country.value');

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
                'label' => __('main.country.name.value'),
                'id' => 'name',
                'placeholder' => __('main.country.name.placeholder'),
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
            'name' => __('main.country.name.value'),
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
        foreach ($this->countries as $key => $countries) {
            $cells = [];
            foreach ($this->columnHeaders() as $fieldName => $fieldValue) {
                if ($fieldName == 'actions') {
                    $cells[$fieldName] = $this->setCellActions($countries);
                    continue;
                }
                $cells[$fieldName] = $countries->{$fieldName};
            }
            $rows[$key + 1] = $cells;
        }
        return $rows;
    }

    /**
     * Set the value of actions
     *
     * @param $countries
     * @return $actionCell
     */
    private function setCellActions($countries)
    {
        $authenticatedUser = request()->user();
        $actionCell = [];

        $updateOneMine = config('privileges.resources_actions_permissions.countries.edit')[0];
        $updateOneTheirs = config('privileges.resources_actions_permissions.countries.edit')[1];
        $deleteOneMine = config('privileges.resources_actions_permissions.countries.destroy')[0];
        $deleteOneTheirs = config('privileges.resources_actions_permissions.countries.destroy')[1];

        if ($authenticatedUser->can($updateOneMine) || $authenticatedUser->can($updateOneTheirs)) {
            $actionCell[] =  [
                'title' => __('main.country.edit_country.value'),
                'url' => route('countries.edit', ['country' => $countries->id]),
                'dataToggle' => '',
                'dialogId' => '',
                'onClick' => '',
                'dialogTitle' => '',
                'dialogBody' => '',
            ];
        }

        if ($authenticatedUser->can($deleteOneMine) || $authenticatedUser->can($deleteOneTheirs)) {
            $actionCell[] =  [
                'title' => __('main.country.delete_country.value'),
                'url' => route('countries.destroy', ['country' => $countries->id]),
                'dataToggle' => 'modal',
                'dialogId' => 'delete-confirmation',
                'onClick' => 'event.preventDefault();',
                'dialogTitle' => __('main.common.delete_confirmation_title.value'),
                'dialogBody' => __('main.common.delete_confirmation_body.value') . 'Country: ' . $countries->title,
            ];
        }
        return $actionCell;
    }
}
