<?php

namespace App\Services\User\CreationStrategies;

use App\Models\User;
use App\Services\UserService;

class ApiBasedStrategy implements CreateStrategyInterface
{

    /**
     * Implementing the creation of a User.
     *
     * @param array $userData
     * @return \App\Models\User
     */
    public function create(array $userData): User
    {
        $userData['account_token'] = bin2hex(openssl_random_pseudo_bytes(30));

        $userService = resolve(UserService::class);
        $user = $userService->makeResource($userData);

        $authenticatedUserId = auth('api')->id();

        $userService->updateResourceApiBased([
            'creator_id' => $authenticatedUserId
        ], $user);

        $user = $user->refresh();

        return $user;
    }
}
