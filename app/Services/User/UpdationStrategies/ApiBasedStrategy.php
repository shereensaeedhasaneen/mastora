<?php

namespace App\Services\User\UpdationStrategies;

use App\Models\User;
use App\Services\UserService;

class ApiBasedStrategy implements UpdateStrategyInterface
{

    /**
     * Implementing the updation of a User.
     *
     * @param array $userData
     * @param \App\Models\User $user
     * @return \App\Models\User
     */
    public function update(array $userData, User $user): User
    {
        $authenticatedUserId = auth('api')->id();
        $userData['last_updater_id'] = $authenticatedUserId;
        $user = $this->updateUser($userData, $user);
        return $user;
    }

    /**
     * Update User.
     *
     * @param array $userData
     * @return \App\Models\User
     */
    private function updateUser(array $userData, User $user): User
    {
        $userService = resolve(UserService::class);
        $updatedUser = $userService->updateResource($userData, $user);
        return $updatedUser;
    }
}
