<?php

namespace App\Services\User\AuthenticationStrategies;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Auth\AuthenticationException;

class TokenStrategy implements AuthenticationStrategyInterface
{

    /**
     * Implementing the authentication of an user.
     *
     * @return \App\Models\User
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function login(): User
    {
        $accountToken = request()->input('account_token');
        $this->validateToken($accountToken);
        $user = $this->getUser($accountToken);
        $user->access_token = auth('api')->login($user);
        return $user;
    }

    /**
     * Validate account token
     *
     * @param string|null $token
     * @return void
     * @throws \Illuminate\Auth\AuthenticationException
     */
    private function validateToken(?string $accountToken): void
    {
        if (empty($accountToken)) {
            throw new AuthenticationException('Account token is required.');
        }
    }

    /**
     * Getting the User by account_token.
     *
     * @param string|null $token
     * @return \App\Models\User
     * @throws \Illuminate\Auth\AuthenticationException
     */
    private function getUser(?string $accountToken): User
    {
        $userService = resolve(UserService::class);
        $users = $userService->retrieveResource(
            ['user' => ['account_token' => $accountToken]]
        );

        if ($users->isEmpty()) {
            throw new AuthenticationException('Account token is invalid.');
        }

        return $users->first();
    }
}
