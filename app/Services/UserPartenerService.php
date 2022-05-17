<?php

namespace App\Services;

use App\Models\UserPartener;
use App\Repositories\UserPartenerRepo;
use App\Services\UserPartener\CreationStrategies\Context as CreateContext;
use App\Services\UserPartener\CreationStrategies\WebBasedStrategy as CreateWebBasedStrategy;
use App\Services\UserPartener\UpdationStrategies\Context as updateContext;
use App\Services\UserPartener\UpdationStrategies\WebBasedStrategy as updateWebBasedStrategy;

class UserPartenerService extends AbstractService
{
    /**
     * Product Category repo
     *
     * @var \App\Repositories\UserPartenerRepo
     */
    protected $repo;

    /**
     * UserPartenerService constructor.
     *
     * @param  \App\Repositories\UserPartenerRepo  $repo
     */
    public function __construct(UserPartenerRepo $repo)
    {
        $this->repo = $repo;
    }

    /**
     * make uniqe id for loun
     * 
     */
    private function makeLounUniqeId($userPartenerData)
    {
        $userPartenerData['userPartener_uniqe_id'] = str_shuffle("13swxskjl54hgjg");
        return $userPartenerData;
    }
    /**
     * Make resource web based.
     * 
     * @param array $userPartenerData
     * @return \App\Models\UserPartener
     */
    public function makeResourceWebBased(array $userPartenerData): UserPartener
    {
        $userPartenerData = $this->makeLounUniqeId($userPartenerData);
        $context = resolve(CreateContext::class);
        $webBasedStrategy = resolve(CreateWebBasedStrategy::class);
        $context->setCreateStrategy($webBasedStrategy);
        $UserPartener = $context->createUserPartener($userPartenerData);
        return $UserPartener;
    }

    /**
     * Update resource web based.
     * 
     * @param array $userPartenerData
     * @param \App\Models\UserPartener $UserPartener
     * @return \App\Models\UserPartener
     */
    public function updateResourceWebBased(array $userPartenerData, UserPartener $userPartener): UserPartener
    {
        $context = resolve(updateContext::class);
        $webBasedStrategy = resolve(updateWebBasedStrategy::class);
        $context->setUpdateStrategy($webBasedStrategy);
        $updatedUserPartener = $context->updateUserPartener($userPartenerData, $userPartener);
        return $updatedUserPartener;
    }
}
