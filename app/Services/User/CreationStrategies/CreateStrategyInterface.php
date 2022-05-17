<?php
namespace App\Services\User\CreationStrategies;

use App\Models\User;

interface CreateStrategyInterface
{
    /**
     * Create User contract.
     *
     * @param array $userData
     * @return \App\Models\User
     */
    public function create(array $userData): User;
}