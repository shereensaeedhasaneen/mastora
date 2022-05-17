<?php

namespace App\Services\FieldInquiry\UpdationStrategies;

use App\Models\FieldInquiry;
use App\Services\FieldInquiryService;

class WebBasedStrategy implements UpdateStrategyInterface
{

    /**
     * Implementing the updation of a product category.
     *
     * @param array $fieldInquiryData
     * @param \App\Models\FieldInquiry $fieldInquiry
     * @return \App\Models\FieldInquiry
     */
    public function update(array $fieldInquiryData, FieldInquiry $fieldInquiry): FieldInquiry
    {
        $authenticatedUserId = auth()->id();
        $fieldInquiryData['last_updater_id'] = $authenticatedUserId;

        $fieldInquiryWithWrappedTranslation = fillingTranslation($fieldInquiryData);

        $fieldInquiry = $this->updateFieldInquiry($fieldInquiryWithWrappedTranslation, $fieldInquiry);


        return $fieldInquiry;
    }

    /**
     * Update product category.
     *
     * @param array $fieldInquiryWithWrappedTranslation
     * @return \App\Models\FieldInquiry
     */
    private function updateFieldInquiry(array $fieldInquiryWithWrappedTranslation, FieldInquiry $fieldInquiry): FieldInquiry
    {
        $fieldInquiryService = resolve(FieldInquiryService::class);
        $translationCode = $fieldInquiryWithWrappedTranslation['translation_language'];
        if (!isDefaultLanguage($translationCode)) {
            return $this->updateFieldInquiryTranslation($fieldInquiryWithWrappedTranslation, $fieldInquiry);
        }
        $updatedFieldInquiry = $fieldInquiryService->updateResource($fieldInquiryWithWrappedTranslation, $fieldInquiry);
        return $updatedFieldInquiry;
    }

    /**
     * Update a product category translations which is not the default ones.
     *
     * @param array $fieldInquiryWithWrappedTranslation
     * @param \App\Models\FieldInquiry $fieldInquiry
     * @return \App\Models\FieldInquiry
     */
    private function updateFieldInquiryTranslation(array $fieldInquiryWithWrappedTranslation, FieldInquiry $fieldInquiry): FieldInquiry
    {
        $translationCode = $fieldInquiryWithWrappedTranslation['translation_language'];
        $translatableAttributes = $fieldInquiryWithWrappedTranslation['filling_translation'];
        foreach ($fieldInquiry->translatedAttributes as $attribute) {
            $fieldInquiry
                ->translateOrNew($translationCode)
                ->{$attribute} = $translatableAttributes[$translationCode][$attribute];
        }
        $fieldInquiry->save();
        return $fieldInquiry;
    }

    
}
