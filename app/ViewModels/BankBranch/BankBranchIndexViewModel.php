<?php

namespace App\ViewModels\BankBranch;

use Spatie\ViewModels\ViewModel;

class BankBranchIndexViewModel extends ViewModel
{

    public $productCategories;
    public $exportRoute;
    public $indexRoute;
    public $title;
    public $createRoute;
    public $createLinkTitle;

    /** 
     * BankBranchIndexViewModel constructor.
     * 
     * @param $productCategories
     */
    public function __construct($productCategories)
    {
        $this->productCategories = $productCategories;
        $this->exportRoute = route('bank-branchs.export');
        $this->indexRoute = route('bank-branchs.index');
        $this->title = __('main.bank_branch.all_bank_branchs.value');

        $this->createRoute = route('bank-branchs.create');
        $this->createLinkTitle = __('main.bank_branch.create_bank_branch.value');
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
                'label' => __('main.bank_branch.name.value'),
                'id' => 'title',
                'placeholder' => __('main.bank_branch.name.placeholder'),
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
            'name' => __('main.bank_branch.name.value'),
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
        foreach ($this->productCategories as $key => $bankBranch) {
            $cells = [];
            foreach ($this->columnHeaders() as $fieldName => $fieldValue) {
                if ($fieldName == 'actions') {
                    $cells[$fieldName] = $this->setCellActions($bankBranch);
                    continue;
                }
                $cells[$fieldName] = $bankBranch->{$fieldName};
            }
            $rows[$key + 1] = $cells;
        }
        return $rows;
    }

    /**
     * Set the value of actions
     *
     * @param $bankBranch
     * @return $actionCell
     */
    private function setCellActions($bankBranch)
    {
        $authenticatedUser = request()->user();
        $actionCell = [];

        $updateOneMine = config('privileges.resources_actions_permissions.bank_branchs.edit')[0];
        $updateOneTheirs = config('privileges.resources_actions_permissions.bank_branchs.edit')[1];
        $deleteOneMine = config('privileges.resources_actions_permissions.bank_branchs.destroy')[0];
        $deleteOneTheirs = config('privileges.resources_actions_permissions.bank_branchs.destroy')[1];

        if ($authenticatedUser->can($updateOneMine) || $authenticatedUser->can($updateOneTheirs)) {
            $actionCell[] =  [
                'title' => __('main.bank_branch.edit_bank_branch.value'),
                'url' => route('bank-branchs.edit', ['bank_branch' => $bankBranch->id]),
                'dataToggle' => '',
                'dialogId' => '',
                'onClick' => '',
                'dialogTitle' => '',
                'dialogBody' => '',
            ];
        }

        if ($authenticatedUser->can($deleteOneMine) || $authenticatedUser->can($deleteOneTheirs)) {
            $actionCell[] =  [
                'title' => __('main.bank_branch.delete_bank_branch.value'),
                'url' => route('bank-branchs.destroy', ['bank_branch' => $bankBranch->id]),
                'dataToggle' => 'modal',
                'dialogId' => 'delete-confirmation',
                'onClick' => 'event.preventDefault();',
                'dialogTitle' => __('main.common.delete_confirmation_title.value'),
                'dialogBody' => __('main.common.delete_confirmation_body.value') . 'Bank Branch: ' . $bankBranch->name,
            ];
        }
        return $actionCell;
    }
}
