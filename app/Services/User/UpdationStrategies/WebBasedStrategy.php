<?php

namespace App\Services\User\UpdationStrategies;

use App\Models\User;
use App\Services\UserService;

class WebBasedStrategy implements UpdateStrategyInterface
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
        $authenticatedUserId = auth()->id();
        $userData['last_updater_id'] = $authenticatedUserId;
        $userData['active'] = $userData['active'] ?? 0;

        $user = $this->updateUser($userData, $user);

        $user->syncRoles($userData['roles'] ?? []);

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
