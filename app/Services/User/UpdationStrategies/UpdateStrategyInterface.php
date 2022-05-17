<?php

namespace App\Services\User\UpdationStrategies;

use App\Models\User;

interface UpdateStrategyInterface
{
    /**
     * Update User contract.
     *
     * @param array $userData
     * @param \App\Models\User $user
     * @return \App\Models\User
     */
    public function update(array $userData, User $user): User;
}
