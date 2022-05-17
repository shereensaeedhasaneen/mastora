<?php

namespace App\ViewModels\Country\FormValues;

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
    public function getCountryName(): string
    {
        return $this->model->name ?? '';
    }

    /**
     * Getting dining category notes.
     *
     * @return string
     */
    public function getCountryDescription(): string
    {
        return $this->translatedModel->description ?? '';
    }

    /**
     * Getting dining category notes.
     *
     * @return string
     */
    public function getCountryNotes(): string
    {
        return $this->translatedModel->notes ?? '';
    }

    
}
