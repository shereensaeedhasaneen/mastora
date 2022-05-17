<?php

namespace App\Repositories;

use App\Models\House;

/**
 * Class House
 *
 * @package App\Repositories
 */
class HouseRepo extends AbstractEntityRepo
{

    /**
     * HouseRepo constructor.
     */
    public function __construct()
    {
        $this->model = new House();
        parent::__construct();
    }

    /**
     * Create entity relations
     *
     * @param  House  $entity
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
     * @param  House  $entity
     * @param $data
     * @return mixed
     */
    protected function updateEntity($entity, $data)
    {
        return $entity;
    }

}
