<?php

namespace App\Services\Country\CreationStrategies;

use App\Models\Country;
use App\Services\CountryService;
use App\Exceptions\FWMK\DefaultTranslationLanguageException;

class WebBasedStrategy implements CreateStrategyInterface
{

    /**
     * Implementing the creation of a product category.
     *
     * @param array $cityData
     * @return \App\Models\Country
     * @throws \App\Exceptions\FWMK\DefaultTranslationLanguageException
     */
    public function create(array $cityData): Country
    {
        if (!isDefaultLanguage($cityData['translation_language'])) {
            throw new DefaultTranslationLanguageException();
        }

        $authenticatedUserId = auth()->id();
        $cityData['creator_id'] = $authenticatedUserId;
        $cityData['last_updater_id'] = $authenticatedUserId;

        $cityWithWrappedTranslation = fillingTranslation($cityData);

        $cityService = resolve(CountryService::class);

        $city = $cityService->makeResource($cityWithWrappedTranslation);
        
       
        return $city;
    }

}
