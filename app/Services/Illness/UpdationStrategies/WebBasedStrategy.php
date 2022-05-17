<?php

namespace App\Services\Illness\UpdationStrategies;

use App\Models\Illness;
use App\Services\IllnessService;

class WebBasedStrategy implements UpdateStrategyInterface
{

    /**
     * Implementing the updation of a product category.
     *
     * @param array $illnessData
     * @param \App\Models\Illness $illness
     * @return \App\Models\Illness
     */
    public function update(array $illnessData, Illness $illness): Illness
    {
        $authenticatedUserId = auth()->id();
        $illnessData['last_updater_id'] = $authenticatedUserId;

        $illnessWithWrappedTranslation = fillingTranslation($illnessData);

        $illness = $this->updateIllness($illnessWithWrappedTranslation, $illness);


        return $illness;
    }

    /**
     * Update product category.
     *
     * @param array $illnessWithWrappedTranslation
     * @return \App\Models\Illness
     */
    private function updateIllness(array $illnessWithWrappedTranslation, Illness $illness): Illness
    {
        $illnessService = resolve(IllnessService::class);
        $translationCode = $illnessWithWrappedTranslation['translation_language'];
        if (!isDefaultLanguage($translationCode)) {
            return $this->updateIllnessTranslation($illnessWithWrappedTranslation, $illness);
        }
        $updatedIllness = $illnessService->updateResource($illnessWithWrappedTranslation, $illness);
        return $updatedIllness;
    }

    /**
     * Update a product category translations which is not the default ones.
     *
     * @param array $illnessWithWrappedTranslation
     * @param \App\Models\Illness $illness
     * @return \App\Models\Illness
     */
    private function updateIllnessTranslation(array $illnessWithWrappedTranslation, Illness $illness): Illness
    {
        $translationCode = $illnessWithWrappedTranslation['translation_language'];
        $translatableAttributes = $illnessWithWrappedTranslation['filling_translation'];
        foreach ($illness->translatedAttributes as $attribute) {
            $illness
                ->translateOrNew($translationCode)
                ->{$attribute} = $translatableAttributes[$translationCode][$attribute];
        }
        $illness->save();
        return $illness;
    }

    
}
