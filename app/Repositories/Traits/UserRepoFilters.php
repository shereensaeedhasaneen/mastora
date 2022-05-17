<?php

namespace App\Repositories\Traits;

trait UserRepoFilters
{
    /**
     * @param $value
     */
    protected function usernameFilter($value)
    {
        $this->getQuery()->where('username', 'like', "%{$value}%");
    }

    /**
     * @param $value
     */
    protected function emailFilter($value)
    {
        $this->getQuery()->where('email', 'like', "%{$value}%");
    }

    /**
     * This method to exclude current admin user from users listing.
     *
     * @param $value
     */
    public function adminUserIdFilter($value)
    {
        $this->query->where('id', '<>', $value);
    }

    /**
     * Role filter
     *
     * @param $value
     */
    protected function roleFilter($value)
    {
        if (! trim($value)) {
            return;
        }
        $this->getQuery()->whereHas('roles', function ($q) use ($value) {
            $q->where('name', $value);
        });
    }
}
