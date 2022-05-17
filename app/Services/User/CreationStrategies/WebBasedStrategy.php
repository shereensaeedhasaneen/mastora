<?php

namespace App\Services\User\CreationStrategies;

use App\Models\User;
use App\Services\UserService;

class WebBasedStrategy implements CreateStrategyInterface
{

    /**
     * Implementing the creation of a user.
     *
     * @param array $userData
     * @return \App\Models\User
     */
    public function create(array $userData): User
    {
        $authenticatedUserId = auth()->id();
        $userData['creator_id'] = $authenticatedUserId;
        $userData['last_updater_id'] = $authenticatedUserId;
        $userData['active'] = $userData['active'] ?? 0;
        $userData['account_token'] = bin2hex(openssl_random_pseudo_bytes(30));

        $userService = resolve(UserService::class);

        $user = $userService->makeResource($userData);

        $user->assignRole($userData['roles'] ?? []);

        return $user;
    }
}
