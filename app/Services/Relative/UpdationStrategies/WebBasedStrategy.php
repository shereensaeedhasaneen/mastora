<?php

namespace App\Services\Relative\UpdationStrategies;

use App\Models\Relative;
use App\Services\RelativeService;

class WebBasedStrategy implements UpdateStrategyInterface
{

    /**
     * Implementing the updation of a product category.
     *
     * @param array $relativeData
     * @param \App\Models\Relative $relative
     * @return \App\Models\Relative
     */
    public function update(array $relativeData, Relative $relative): Relative
    {
        $authenticatedUserId = auth()->id();
        $relativeData['last_updater_id'] = $authenticatedUserId;

        $relativeWithWrappedTranslation = fillingTranslation($relativeData);

        $relative = $this->updateRelative($relativeWithWrappedTranslation, $relative);


        return $relative;
    }

    /**
     * Update product category.
     *
     * @param array $relativeWithWrappedTranslation
     * @return \App\Models\Relative
     */
    private function updateRelative(array $relativeWithWrappedTranslation, Relative $relative): Relative
    {
        $relativeService = resolve(RelativeService::class);
        $translationCode = $relativeWithWrappedTranslation['translation_language'];
        if (!isDefaultLanguage($translationCode)) {
            return $this->updateRelativeTranslation($relativeWithWrappedTranslation, $relative);
        }
        $updatedRelative = $relativeService->updateResource($relativeWithWrappedTranslation, $relative);
        return $updatedRelative;
    }

    /**
     * Update a product category translations which is not the default ones.
     *
     * @param array $relativeWithWrappedTranslation
     * @param \App\Models\Relative $relative
     * @return \App\Models\Relative
     */
    private function updateRelativeTranslation(array $relativeWithWrappedTranslation, Relative $relative): Relative
    {
        $translationCode = $relativeWithWrappedTranslation['translation_language'];
        $translatableAttributes = $relativeWithWrappedTranslation['filling_translation'];
        foreach ($relative->translatedAttributes as $attribute) {
            $relative
                ->translateOrNew($translationCode)
                ->{$attribute} = $translatableAttributes[$translationCode][$attribute];
        }
        $relative->save();
        return $relative;
    }

    
}
