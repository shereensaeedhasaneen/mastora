<?php

namespace App\Services\BankBranch\CreationStrategies;

use App\Models\BankBranch;
use App\Services\BankBranchService;
use App\Exceptions\FWMK\DefaultTranslationLanguageException;

class WebBasedStrategy implements CreateStrategyInterface
{

    /**
     * Implementing the creation of a product category.
     *
     * @param array $cityData
     * @return \App\Models\BankBranch
     * @throws \App\Exceptions\FWMK\DefaultTranslationLanguageException
     */
    public function create(array $cityData): BankBranch
    {
        if (!isDefaultLanguage($cityData['translation_language'])) {
            throw new DefaultTranslationLanguageException();
        }

        $authenticatedUserId = auth()->id();
        $cityData['creator_id'] = $authenticatedUserId;
        $cityData['last_updater_id'] = $authenticatedUserId;

        $cityWithWrappedTranslation = fillingTranslation($cityData);

        $cityService = resolve(BankBranchService::class);

        $city = $cityService->makeResource($cityWithWrappedTranslation);
        
       
        return $city;
    }

}
