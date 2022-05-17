<?php

namespace App\Services\UserPartener\UpdationStrategies;

use App\Models\UserPartener;
use App\Services\UserPartenerService;

class WebBasedStrategy implements UpdateStrategyInterface
{

    /**
     * Implementing the updation of a product category.
     *
     * @param array $userPartenerData
     * @param \App\Models\UserPartener $userPartener
     * @return \App\Models\UserPartener
     */
    public function update(array $userPartenerData, UserPartener $userPartener): UserPartener
    {
        $authenticatedUserId = auth()->id();
        $userPartenerData['last_updater_id'] = $authenticatedUserId;


        $userPartener = $this->updateUserPartener($userPartenerData, $userPartener);


        return $userPartener;
    }

    /**
     * Update product category.
     *
     * @param array $userPartenerWithWrappedTranslation
     * @return \App\Models\UserPartener
     */
    private function updateUserPartener(array $userPartenerWithWrappedTranslation, UserPartener $userPartener): UserPartener
    {
        $userPartenerService = resolve(UserPartenerService::class);
        $updatedUserPartener = $userPartenerService->updateResource($userPartenerWithWrappedTranslation, $userPartener);
        return $updatedUserPartener;
    }

    
}
