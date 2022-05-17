<?php

namespace App\Repositories;

use App\Models\Cost;

/**
 * Class Cost
 *
 * @package App\Repositories
 */
class CostRepo extends AbstractEntityRepo
{

    /**
     * CostRepo constructor.
     */
    public function __construct()
    {
        $this->model = new Cost();
        parent::__construct();
    }

    /**
     * Create entity relations
     *
     * @param  Cost  $entity
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
     * @param  Cost  $entity
     * @param $data
     * @return mixed
     */
    protected function updateEntity($entity, $data)
    {
        return $entity;
    }

}
