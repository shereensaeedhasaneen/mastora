<?php
namespace App\Services\UserPartener\CreationStrategies;

use App\Models\UserPartener;

interface CreateStrategyInterface
{
    /**
     * Create UserPartener contract.
     *
     * @param array $userPartenerData
     * @return \App\Models\UserPartener
     */
    public function create(array $userPartenerData): UserPartener;
}