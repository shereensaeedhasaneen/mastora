<?php

namespace App\Services\User\AuthenticationStrategies;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Auth\AuthenticationException;

class EmailPasswordStrategy implements AuthenticationStrategyInterface
{

    /**
     * Implementing the authentication of an user.
     *
     * @return \App\Models\User
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function login(): User
    {
        $token = auth('api')->attempt(request(['email', 'password']));
        if (empty($token)) {
            throw new AuthenticationException('Fail to login, These credentials do not match our records.');
        }
        return $this->updateUser($token);
    }

    /**
     * Update user data.
     *
     * @param string $token
     * @return user
     */
    private function updateUser(string $token): user
    {
        $user = auth('api')->user();
        $userService = resolve(UserService::class);
        $userService->updateResource(['provider_id' => null, 'provider_name' => null], $user);

        $user->access_token = $token;
        return $user;
    }
}
