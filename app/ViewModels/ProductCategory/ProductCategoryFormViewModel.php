<?php

namespace App\ViewModels\ProductCategory;

use App\Models\ProductCategory;
use App\ViewModels\ProductCategory\FormValues\ElementsValues;
use Spatie\ViewModels\ViewModel;
use Illuminate\Database\Eloquent\Model;

class ProductCategoryFormViewModel extends ViewModel
{
    public $title;
    public $formAction;
    public $submitButton;
    private $translationLanguage;
    private $defaultTranslationLanguage;
    private $model;
    private $elementsValues;

    /**
     * ProductCategoryFormViewModel constructor.
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
        $this->model = $model ?? new ProductCategory();
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
            $this->title = __('main.product_category.create_product_category.value');
            return;
        }
        $this->title = __('main.product_category.edit_product_category.value');
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
                'route' => route('product-categories.store'),
                'method' => 'POST'
            ];
            return;
        }
        $this->formAction = [
            'route' => route('product-categories.update', ['product_category' => $this->model]),
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
                'id' => 'product-category-translation-language',
                'elementClasses' => '',
            ],
            [
                'element' => 'input',
                'inputType' => 'text',
                'name' => 'title',
                'value' => $this->elementsValues->getProductCategoryTitle(),
                'label' => __('main.product_category.title.value'),
                'id' => 'product-category-title',
                'placeholder' => __('main.product_category.title.placeholder'),
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
                'element' => 'textarea',
                'inputType' => '',
                'name' => 'description',
                'value' => $this->elementsValues->getProductCategoryDescription(),
                'label' => __('main.product_category.description.value'),
                'id' => 'product-category-description',
                'placeholder' => __('main.product_category.description.placeholder'),
                'wrapClasses' => 'form-group',
                'elementClasses' => 'form-control',
                'labelClasses' => 'form-label',
                'required' => false,
                'rows' => '',
                'cols' => '',
                'actionOneName' => '',
                'actionOneAttributes' => urlencode('{}'),
                'actionTwoName' => '',
                'actionTwoAttributes' => urlencode('{}'),
            ],
            [
                'element' => 'textarea',
                'inputType' => '',
                'name' => 'notes',
                'value' => $this->elementsValues->getProductCategoryNotes(),
                'label' => __('main.product_category.notes.value'),
                'id' => 'product-category-notes',
                'placeholder' => __('main.product_category.notes.placeholder'),
                'wrapClasses' => 'form-group',
                'elementClasses' => 'form-control',
                'labelClasses' => 'form-label',
                'required' => false,
                'rows' => '',
                'cols' => '',
                'actionOneName' => '',
                'actionOneAttributes' => urlencode('{}'),
                'actionTwoName' => '',
                'actionTwoAttributes' => urlencode('{}'),
            ],
        
        ];

        $elements = filteringFormELementsFromModelTranslatedAttributes(
            $elements, 
            [...$this->model->translatedAttributes, 'translation_language'],
            $this->translationLanguage
        );

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
            'routeParameters' => !empty($this->model->id) ? ['product_category' => $this->model->id] : [],
            'isEditMode' => !empty($this->model->id),
        ];
    }
}