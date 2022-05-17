<?php

namespace App\ViewModels\ProductCategory\FormValues;

use Illuminate\Database\Eloquent\Model;

class  ElementsValues
{
    private $translationLanguage;
    private $translatedModel;



    public function __construct(Model $model, string $translationLanguage)
    {
        $this->model = $model;
        $this->translationLanguage = $translationLanguage;
        $this->setTranslatedModel($model);

    }


    /**
     * Setting translated model.
     *
     * @param \Illuminate\Database\Eloquent\Model|null
     * @return void
     */
    private function setTranslatedModel(?Model $model): void
    {
        $this->translatedModel = $model->translate($this->translationLanguage);
    }

    /**
     * Getting dining category name.
     *
     * @return string
     */
    public function getProductCategoryTitle(): string
    {
        return $this->translatedModel->title ?? '';
    }

    /**
     * Getting dining category notes.
     *
     * @return string
     */
    public function getProductCategoryDescription(): string
    {
        return $this->translatedModel->description ?? '';
    }

    /**
     * Getting dining category notes.
     *
     * @return string
     */
    public function getProductCategoryNotes(): string
    {
        return $this->translatedModel->notes ?? '';
    }

    
}
