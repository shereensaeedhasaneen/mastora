<?php

namespace App\ViewModels\City\FormValues;

use Illuminate\Database\Eloquent\Model;

class  ElementsValues
{
    private $translationLanguage;
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
    public function getCityTitle(): string
    {
        return $this->model->name ?? '';
    }

    /**
     * Getting dining category notes.
     *
     * @return string
     */
    public function getCityCountryId(): string
    {
        return $this->model->country_id ?? '';
    }

    /**
     * Getting dining category notes.
     *
     * @return string
     */
    public function getCityNotes(): string
    {
        return $this->translatedModel->notes ?? '';
    }

    
}
