<?php

namespace App\Services\User\AuthenticationStrategies;

use App\Models\User;

class Context
{
    /**
     * @var \App\Services\User\CreationStrategies\AuthenticationStrategyInterface
     */
    private $authenticationStrategy;

    /**
     * Set the value of authenticationStrategy.
     *
     * @param \App\Services\User\CreationStrategies\AuthenticationStrategyInterface $authenticationStrategy
     * @return  void
     */
    public function setAuthenticationStrategy(AuthenticationStrategyInterface $authenticationStrategy): void
    {
        $this->authenticationStrategy = $authenticationStrategy;
    }

    /**
     * Authenticate an user.
     *
     * @return \App\Models\User
     */
    public function authenticate(): User
    {
        $user = $this->authenticationStrategy->login();
        return $user;
    }
}
