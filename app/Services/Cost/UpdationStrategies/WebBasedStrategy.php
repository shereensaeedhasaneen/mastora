<?php

namespace App\Services\Cost\UpdationStrategies;

use App\Models\Cost;
use App\Services\CostService;

class WebBasedStrategy implements UpdateStrategyInterface
{

    /**
     * Implementing the updation of a product category.
     *
     * @param array $costData
     * @param \App\Models\Cost $cost
     * @return \App\Models\Cost
     */
    public function update(array $costData, Cost $cost): Cost
    {
        $authenticatedUserId = auth()->id();
        $costData['last_updater_id'] = $authenticatedUserId;

        $costWithWrappedTranslation = fillingTranslation($costData);

        $cost = $this->updateCost($costWithWrappedTranslation, $cost);


        return $cost;
    }

    /**
     * Update product category.
     *
     * @param array $costWithWrappedTranslation
     * @return \App\Models\Cost
     */
    private function updateCost(array $costWithWrappedTranslation, Cost $cost): Cost
    {
        $costService = resolve(CostService::class);
        $translationCode = $costWithWrappedTranslation['translation_language'];
        if (!isDefaultLanguage($translationCode)) {
            return $this->updateCostTranslation($costWithWrappedTranslation, $cost);
        }
        $updatedCost = $costService->updateResource($costWithWrappedTranslation, $cost);
        return $updatedCost;
    }

    /**
     * Update a product category translations which is not the default ones.
     *
     * @param array $costWithWrappedTranslation
     * @param \App\Models\Cost $cost
     * @return \App\Models\Cost
     */
    private function updateCostTranslation(array $costWithWrappedTranslation, Cost $cost): Cost
    {
        $translationCode = $costWithWrappedTranslation['translation_language'];
        $translatableAttributes = $costWithWrappedTranslation['filling_translation'];
        foreach ($cost->translatedAttributes as $attribute) {
            $cost
                ->translateOrNew($translationCode)
                ->{$attribute} = $translatableAttributes[$translationCode][$attribute];
        }
        $cost->save();
        return $cost;
    }

    
}
