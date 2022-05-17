<?php

namespace App\ViewModels\City;

use App\Models\City;
use App\Models\Country;
use App\ViewModels\City\FormValues\ElementsValues;
use Spatie\ViewModels\ViewModel;
use Illuminate\Database\Eloquent\Model;

class CityFormViewModel extends ViewModel
{
    public $title;
    public $formAction;
    public $submitButton;
    private $translationLanguage;
    private $defaultTranslationLanguage;
    private $model;
    private $elementsValues;

    /**
     * CityFormViewModel constructor.
     * 
     * @param string $translationLanguage
     * @param Illuminate\Database\Eloquent\Model $model
     */
    public function __construct(?string $translationLanguage, Model $model = null)
    {
        $this->setModel($model);
        $this->setTranslationLanguage($translationLanguage);

        $this->setSubmitButton();
        $this->setFormAction();
        $this->setTitle();

        $this->setElementsValues();
    }

    /**
     * Set the value of model
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function setModel(?Model $model): void
    {
        $this->model = $model ?? new City();
    }

    /**
     * Set the value of translationLanguage.
     *
     * @param string $translationLanguage
     * @return void
     */
    public function setTranslationLanguage(?string $translationLanguage): void
    {
        $this->setDefaultTranslationLanguage();
        $this->translationLanguage = $translationLanguage ?? $this->defaultTranslationLanguage;
    }

    /**
     * Set the value of defaultTranslationLanguage
     *
     * @return void
     */
    public function setDefaultTranslationLanguage(): void
    {
        $this->defaultTranslationLanguage = config('localization.default_translation_language');
    }

    /**
     * Set the value of title 
     *
     * @return void
     */
    private function setTitle(): void
    {
        if (empty($this->model->id)) {
            $this->title = __('main.city.create_city.value');
            return;
        }
        $this->title = __('main.city.edit_city.value');
    }

    /**
     * Set the value of formAction
     *
     * @return void
     */
    private function setFormAction(): void
    {
        if (empty($this->model->id)) {
            $this->formAction = [
                'route' => route('cities.store'),
                'method' => 'POST'
            ];
            return;
        }
        $this->formAction = [
            'route' => route('cities.update', ['city' => $this->model]),
            'method' => 'PUT'
        ];
    }

    /**
     * Set the value of submitButton
     *
     * @return void
     */
    private function setSubmitButton(): void
    {
        if (empty($this->model->id)) {
            $this->submitButton = __('main.common.save.value');
            return;
        }
        $this->submitButton = __('main.common.update.value');
    }

    /**
     * Set the value of elementsValues
     *
     * @return void
     */
    private function setElementsValues(): void
    {
        $this->elementsValues = new ElementsValues($this->model, $this->translationLanguage);
    }

    /**
     *  Blade components represent form HTML elements.
     *
     * @return array
     */
    public function elements(): array
    {

        $elements = [
            [
                'element' => 'input-hidden',
                'inputType' => 'hidden',
                'name' => 'translation_language',
                'value' => $this->translationLanguage,
                'id' => 'city-translation-language',
                'elementClasses' => '',
            ],
            [
                'element' => 'input',
                'inputType' => 'text',
                'name' => 'name',
                'value' => $this->elementsValues->getCityTitle(),
                'label' => __('main.city.name.value'),
                'id' => 'city-title',
                'placeholder' => __('main.city.name.placeholder'),
                'wrapClasses' => 'form-group',
                'elementClasses' => 'form-control',
                'labelClasses' => 'form-label',
                'required' => true,
                'actionOneName' => '',
                'actionOneAttributes' => urlencode('{}'),
                'actionTwoName' => '',
                'actionTwoAttributes' => urlencode('{}'),
            ],

            [
                'element' => 'select',
                'name' => 'country_id',
                'value' => $this->elementsValues->getCityCountryId(),
                'label' => __('main.city.country_id.value'),
                'id' => 'tour-accessibility-id',
                'placeholder' => __('main.city.country_id.placeholder'),
                'wrapClasses' => 'form-group',
                'elementClasses' => 'form-control',
                'labelClasses' => 'form-label',
                'required' => false,
                'options' => Country::all()
                    ->pluck('name', 'id')
                    ->toArray(),
                'actionOneName' =>  "",
                'actionOneAttributes' => urlencode('{}'),
                'actionTwoName' => '',
                'actionTwoAttributes' => urlencode('{}'),
                'multiple' => false,
                "currentTranslationLanguage" => $this->translationLanguage,
                'size' => 1,
            ],
        
        ];

        

        return $elements;
    }

    /**
     * Setting up translation-language-switcher component with its properties 
     * values.
     * 
     * @return array
     */
    public function translationLanguageSwitcher(): array
    {
        return [
            'routeName' => request()->route()->getName(),
            'routeParameters' => !empty($this->model->id) ? ['city' => $this->model->id] : [],
            'isEditMode' => !empty($this->model->id),
        ];
    }
}