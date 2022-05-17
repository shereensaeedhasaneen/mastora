<?php

namespace App\Services\City\CreationStrategies;

use App\Models\City;
use App\Services\CityService;
use App\Exceptions\FWMK\DefaultTranslationLanguageException;

class WebBasedStrategy implements CreateStrategyInterface
{

    /**
     * Implementing the creation of a product category.
     *
     * @param array $cityData
     * @return \App\Models\City
     * @throws \App\Exceptions\FWMK\DefaultTranslationLanguageException
     */
    public function create(array $cityData): City
    {
        if (!isDefaultLanguage($cityData['translation_language'])) {
            throw new DefaultTranslationLanguageException();
        }

        $authenticatedUserId = auth()->id();
        $cityData['creator_id'] = $authenticatedUserId;
        $cityData['last_updater_id'] = $authenticatedUserId;

        $cityWithWrappedTranslation = fillingTranslation($cityData);

        $cityService = resolve(CityService::class);

        $city = $cityService->makeResource($cityWithWrappedTranslation);
        
       
        return $city;
    }

}
