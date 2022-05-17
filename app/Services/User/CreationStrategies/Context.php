<?php

namespace App\Services\User\CreationStrategies;

use App\Models\User;

class Context
{
    /**
     * @var \App\Services\User\CreationStrategies\CreateStrategyInterface
     */
    private $createStrategy;

    /**
     * Set the value of createStrategy.
     *
     * @param \App\Services\User\CreationStrategies\CreateStrategyInterface $createStrategy
     * @return  void
     */
    public function setCreateStrategy(CreateStrategyInterface $createStrategy): void
    {
        $this->createStrategy = $createStrategy;
    }

    /**
     * Create User.
     *
     * @param array $userData
     * @return \App\Models\User
     */
    public function createUser(array $userData): User
    {
        $user = $this->createStrategy
            ->create($userData);
        return $user;
    }
}
