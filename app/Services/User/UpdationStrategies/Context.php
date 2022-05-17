<?php

namespace App\Services\User\UpdationStrategies;

use App\Models\User;

class Context
{
    /**
     * @var \App\Services\User\UpdationStrategies\UpdateStrategyInterface
     */
    private $updateStrategy;

    /**
     * Set the value of updateStrategy.
     *
     * @param \App\Services\User\UpdationStrategies\UpdateStrategyInterface $updateStrategy
     * @return  void
     */
    public function setUpdateStrategy(UpdateStrategyInterface $updateStrategy): void
    {
        $this->updateStrategy = $updateStrategy;
    }

    /**
     * Update device.
     *
     * @param array $userData
     * @param \App\Models\User $user
     * @return User
     */
    public function updateUser(array $userData, User $user): User
    {
        $user = $this->updateStrategy->update($userData, $user);
        return $user;
    }
}
