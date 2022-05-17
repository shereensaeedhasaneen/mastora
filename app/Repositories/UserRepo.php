<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Traits\UserRepoFilters;

/**
 * Class UserRepo
 *
 * @package App\Repositories
 */
class UserRepo extends AbstractEntityRepo
{
    use UserRepoFilters;

    /**
     * UserRepo constructor.
     */
    public function __construct()
    {
        $this->model = new User();
        parent::__construct();
    }

    /**
     * Create entity relations
     *
     * @param  User  $entity
     * @param $data
     * @return mixed
     */
    protected function createEntity($entity, $data)
    {
        $this->syncUserRoles($entity, $data['role'] ?? null);

        return $entity;
    }

    /**
     * Update entity
     *
     * @param  User  $entity
     * @param $data
     * @return mixed
     */
    protected function updateEntity($entity, $data)
    {
        $this->syncUserRoles($entity, $data['role'] ?? null);

        return $entity;
    }

    /**
     * Sync user roles
     *
     * @param User $user
     * @param  null  $role
     */
    protected function syncUserRoles(User $user, $role = null)
    {
        $newRole = $role ? [$role] : [];
        $user->syncRoles($newRole);
    }
}
