<?php

namespace App\Services\Country\UpdationStrategies;

use App\Models\Country;
use App\Services\CountryService;

class WebBasedStrategy implements UpdateStrategyInterface
{

    /**
     * Implementing the updation of a product category.
     *
     * @param array $cityData
     * @param \App\Models\Country $city
     * @return \App\Models\Country
     */
    public function update(array $cityData, Country $city): Country
    {
        $authenticatedUserId = auth()->id();
        $cityData['last_updater_id'] = $authenticatedUserId;

        $cityWithWrappedTranslation = fillingTranslation($cityData);

        $city = $this->updateCountry($cityWithWrappedTranslation, $city);


        return $city;
    }

    /**
     * Update product category.
     *
     * @param array $cityWithWrappedTranslation
     * @return \App\Models\Country
     */
    private function updateCountry(array $cityWithWrappedTranslation, Country $city): Country
    {
        $cityService = resolve(CountryService::class);
        $translationCode = $cityWithWrappedTranslation['translation_language'];
        if (!isDefaultLanguage($translationCode)) {
            return $this->updateCountryTranslation($cityWithWrappedTranslation, $city);
        }
        $updatedCountry = $cityService->updateResource($cityWithWrappedTranslation, $city);
        return $updatedCountry;
    }

    /**
     * Update a product category translations which is not the default ones.
     *
     * @param array $cityWithWrappedTranslation
     * @param \App\Models\Country $city
     * @return \App\Models\Country
     */
    private function updateCountryTranslation(array $cityWithWrappedTranslation, Country $city): Country
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
