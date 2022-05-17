<?php

namespace App\Services\UserPartener\CreationStrategies;

use App\Models\UserPartener;
use App\Services\UserPartenerService;

class WebBasedStrategy implements CreateStrategyInterface
{

    /**
     * Implementing the creation of a product category.
     *
     * @param array $userPartenerData
     * @return \App\Models\UserPartener
     * @throws \App\Exceptions\FWMK\DefaultTranslationLanguageException
     */
    public function create(array $userPartenerData): UserPartener
    {

        $authenticatedUserId = auth()->id();
        $userPartenerData['creator_id'] = $authenticatedUserId;
        $userPartenerData['last_updater_id'] = $authenticatedUserId;


        $userPartenerService = resolve(UserPartenerService::class);

        $userPartener = $userPartenerService->makeResource($userPartenerData);
        
        
       
        return $userPartener;
    }

}
