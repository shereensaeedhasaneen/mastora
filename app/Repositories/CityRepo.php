<?php

namespace App\Repositories;

use App\Models\City;

/**
 * Class City
 *
 * @package App\Repositories
 */
class CityRepo extends AbstractEntityRepo
{

    /**
     * CityRepo constructor.
     */
    public function __construct()
    {
        $this->model = new City();
        parent::__construct();
    }

    /**
     * Create entity relations
     *
     * @param  City  $entity
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
     * @param  City  $entity
     * @param $data
     * @return mixed
     */
    protected function updateEntity($entity, $data)
    {
        return $entity;
    }

}
