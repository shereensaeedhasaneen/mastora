<?php

namespace App\ViewModels\BankBranch\FormValues;

use Illuminate\Database\Eloquent\Model;

class  ElementsValues
{
    private $translatedModel;



    public function __construct(Model $model)
    {
        $this->model = $model;

    }

    /**
     * Getting dining category name.
     *
     * @return string
     */
    public function getBankBranchTitle(): string
    {
        return $this->model->name ?? '';
    }

    /**
     * Getting dining category notes.
     *
     * @return string
     */
    public function getBankBranchCountryId(): string
    {
        return $this->model->country_id ?? '';
    }

    
}
