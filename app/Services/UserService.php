<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepo;
use App\Services\User\CreationStrategies\Context as CreateContext;
use App\Services\User\UpdationStrategies\Context as updateContext;
use App\Services\User\CreationStrategies\ApiBasedStrategy as CreateApiBasedStrategy;
use App\Services\User\CreationStrategies\WebBasedStrategy as CreateWebBasedStrategy;
use App\Services\User\UpdationStrategies\ApiBasedStrategy as updateApiBasedStrategy;
use App\Services\User\UpdationStrategies\WebBasedStrategy as updateWebBasedStrategy;

class UserService extends AbstractService
{

    /**
     * User repo
     *
     * @var \App\Repositories\UserRepo
     */
    protected $repo;

    /**
     * UserService constructor.
     *
     * @param  \App\Repositories\UserRepo  $repo
     */
    public function __construct(UserRepo $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Make resource web based.
     * 
     * @param array $userData
     * @return \App\Models\User
     */
    public function makeResourceWebBased(array $userData): User
    {
        $context = resolve(CreateContext::class);
        $webBasedStrategy = resolve(CreateWebBasedStrategy::class);
        $context->setCreateStrategy($webBasedStrategy);
        $user = $context->createUser($userData);
        return $user;
    }

    /**
     * Update resource web based.
     * 
     * @param array $userData
     * @param \App\Models\User $user
     * @return \App\Models\User
     */
    public function updateResourceWebBased(array $userData, User $user): User
    {
        $context = resolve(updateContext::class);
        $webBasedStrategy = resolve(updateWebBasedStrategy::class);
        $context->setUpdateStrategy($webBasedStrategy);
        $updatedUser = $context->updateUser($userData, $user);
        return $updatedUser;
    }

    /**
     * Make resource API based.
     * 
     * @param array $userData
     * @return \App\Models\User
     */
    public function makeResourceApiBased(array $userData): User
    {
        $context = resolve(CreateContext::class);
        $apiBasedStrategy = resolve(CreateApiBasedStrategy::class);
        $context->setCreateStrategy($apiBasedStrategy);
        $user  = $context->createUser($userData);
        return $user;
    }

    /**
     * Update resource API based.
     * 
     * @param array $userData
     * @param \App\Models\User $user
     * @return \App\Models\User
     */
    public function updateResourceApiBased(array $userData, User $user): User
    {
        $context = resolve(updateContext::class);
        $apiBasedStrategy = resolve(updateApiBasedStrategy::class);
        $context->setUpdateStrategy($apiBasedStrategy);
        $updatedUser = $context->updateUser($userData, $user);
        return $updatedUser;
    }
}
