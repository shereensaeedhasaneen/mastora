<?php

namespace App\Services\UserPartener\CreationStrategies;

use App\Models\UserPartener;

class Context
{
    /**
     * @var \App\Services\UserPartener\CreationStrategies\CreateStrategyInterface
     */
    private $createStrategy;

    /**
     * Set the value of createStrategy.
     *
     * @param \App\Services\UserPartener\CreationStrategies\CreateStrategyInterface $createStrategy
     * @return  void
     */
    public function setCreateStrategy(CreateStrategyInterface $createStrategy): void
    {
        $this->createStrategy = $createStrategy;
    }

    /**
     * Create Product category.
     *
     * @param array $userPartenerData
     * @return \App\Models\UserPartener
     */
    public function createUserPartener(array $userPartenerData): UserPartener
    {
        $userPartener = $this->createStrategy
            ->create($userPartenerData);
        return $userPartener;
    }
}
