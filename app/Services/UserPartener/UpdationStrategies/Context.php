<?php

namespace App\Services\UserPartener\UpdationStrategies;

use App\Models\UserPartener;

class Context
{
    /**
     * @var \App\Services\UserPartener\UpdationStrategies\UpdateStrategyInterface
     */
    private $updateStrategy;

    /**
     * Set the value of updateStrategy.
     *
     * @param \App\Services\UserPartener\UpdationStrategies\UpdateStrategyInterface $updateStrategy
     * @return  void
     */
    public function setUpdateStrategy(UpdateStrategyInterface $updateStrategy): void
    {
        $this->updateStrategy = $updateStrategy;
    }

    /**
     * Update product category.
     *
     * @param array $userPartenerData
     * @param \App\Models\UserPartener $userPartener
     * @return UserPartener
     */
    public function updateUserPartener(array $userPartenerData, UserPartener $userPartener): UserPartener
    {
        $userPartener = $this->updateStrategy->update($userPartenerData, $userPartener);
        return $userPartener;
    }
}
