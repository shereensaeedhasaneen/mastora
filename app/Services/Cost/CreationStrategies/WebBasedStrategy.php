<?php

namespace App\Services\Cost\CreationStrategies;

use App\Models\Cost;
use App\Services\CostService;

class WebBasedStrategy implements CreateStrategyInterface
{

    /**
     * Implementing the creation of a product category.
     *
     * @param array $costData
     * @return \App\Models\Cost
     */
    public function create(array $costData): Cost
    {

        $costService = resolve(CostService::class);

        $cost = $costService->makeResource($costData);
        
       
        return $cost;
    }

}
