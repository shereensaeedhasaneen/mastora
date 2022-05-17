<?php

namespace App\Repositories;

use App\Models\SocialResearch;

/**
 * Class SocialResearch
 *
 * @package App\Repositories
 */
class SocialResearchRepo extends AbstractEntityRepo
{

    /**
     * SocialResearchRepo constructor.
     */
    public function __construct()
    {
        $this->model = new SocialResearch();
        parent::__construct();
    }

    /**
     * Create entity relations
     *
     * @param  SocialResearch  $entity
     * @param $data
     * @return mixed
     */
    protected function createEntity($entity, $data)
    {
        return $entity;
    }

    /**
     * Update entity
     *
     * @param  SocialResearch  $entity
     * @param $data
     * @return mixed
     */
    protected function updateEntity($entity, $data)
    {
        return $entity;
    }

}
