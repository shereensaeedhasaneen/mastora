<?php

namespace App\Services\UserPartener\UpdationStrategies;

use App\Models\UserPartener;

interface UpdateStrategyInterface
{
    /**
     * Update Product Category contract.
     *
     * @param array $userPartenerData
     * @param \App\Models\UserPartener $userPartener
     * @return \App\Models\UserPartener
     */
    public function update(array $userPartenerData, UserPartener $userPartener): UserPartener;
}
