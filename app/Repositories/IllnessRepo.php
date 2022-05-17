<?php

namespace App\Repositories;

use App\Models\Illness;

/**
 * Class Illness
 *
 * @package App\Repositories
 */
class IllnessRepo extends AbstractEntityRepo
{

    /**
     * IllnessRepo constructor.
     */
    public function __construct()
    {
        $this->model = new Illness();
        parent::__construct();
    }

    /**
     * Create entity relations
     *
     * @param  Illness  $entity
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
     * @param  Illness  $entity
     * @param $data
     * @return mixed
     */
    protected function updateEntity($entity, $data)
    {
        return $entity;
    }

}
