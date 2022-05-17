<?php

namespace App\Services\City\UpdationStrategies;

use App\Models\City;
use App\Services\CityService;

class WebBasedStrategy implements UpdateStrategyInterface
{

    /**
     * Implementing the updation of a product category.
     *
     * @param array $cityData
     * @param \App\Models\City $city
     * @return \App\Models\City
     */
    public function update(array $cityData, City $city): City
    {
        $authenticatedUserId = auth()->id();
        $cityData['last_updater_id'] = $authenticatedUserId;

        $cityWithWrappedTranslation = fillingTranslation($cityData);

        $city = $this->updateCity($cityWithWrappedTranslation, $city);


        return $city;
    }

    /**
     * Update product category.
     *
     * @param array $cityWithWrappedTranslation
     * @return \App\Models\City
     */
    private function updateCity(array $cityWithWrappedTranslation, City $city): City
    {
        $cityService = resolve(CityService::class);
        $translationCode = $cityWithWrappedTranslation['translation_language'];
        if (!isDefaultLanguage($translationCode)) {
            return $this->updateCityTranslation($cityWithWrappedTranslation, $city);
        }
        $updatedCity = $cityService->updateResource($cityWithWrappedTranslation, $city);
        return $updatedCity;
    }

    /**
     * Update a product category translations which is not the default ones.
     *
     * @param array $cityWithWrappedTranslation
     * @param \App\Models\City $city
     * @return \App\Models\City
     */
    private function updateCityTranslation(array $cityWithWrappedTranslation, City $city): City
    {
        $translationCode = $cityWithWrappedTranslation['translation_language'];
        $translatableAttributes = $cityWithWrappedTranslation['filling_translation'];
        foreach ($city->translatedAttributes as $attribute) {
            $city
                ->translateOrNew($translationCode)
                ->{$attribute} = $translatableAttributes[$translationCode][$attribute];
        }
        $city->save();
        return $city;
    }

    
}
