<?php

namespace App\Services\Illness\CreationStrategies;

use App\Models\Illness;
use App\Services\IllnessService;

class WebBasedStrategy implements CreateStrategyInterface
{

    /**
     * Implementing the creation of a product category.
     *
     * @param array $illnessData
     * @return \App\Models\Illness
     */
    public function create(array $illnessData): Illness
    {

        $authenticatedUserId = auth()->id();
        $illnessData['creator_id'] = $authenticatedUserId;
        $illnessData['last_updater_id'] = $authenticatedUserId;

        $illnessService = resolve(IllnessService::class);

        $illness = $illnessService->makeResource($illnessData);
        
        return $illness;
    }

}
