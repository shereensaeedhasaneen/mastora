<?php
namespace App\Services\User\AuthenticationStrategies;

use App\Models\User;

interface AuthenticationStrategyInterface
{
    /**
     * Authenticate an user contract.
     *
     * @return \App\Models\User
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function login(): User;
}