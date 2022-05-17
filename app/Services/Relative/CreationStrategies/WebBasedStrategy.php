<?php

namespace App\Services\Relative\CreationStrategies;

use App\Models\Relative;
use App\Services\RelativeService;
use App\Exceptions\FWMK\DefaultTranslationLanguageException;

class WebBasedStrategy implements CreateStrategyInterface
{

    /**
     * Implementing the creation of a product category.
     *
     * @param array $relativeData
     * @return \App\Models\Relative
     * @throws \App\Exceptions\FWMK\DefaultTranslationLanguageException
     */
    public function create(array $relativeData): Relative
    {
        
        $authenticatedUserId = auth()->id();
        $relativeData['creator_id'] = $authenticatedUserId;
        $relativeData['last_updater_id'] = $authenticatedUserId;

        $relativeService = resolve(RelativeService::class);

        $relative = $relativeService->makeResource($relativeData);
        
       
        return $relative;
    }

}
