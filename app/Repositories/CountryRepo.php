<?php

namespace App\Repositories;

use App\Models\Country;

/**
 * Class Country
 *
 * @package App\Repositories
 */
class CountryRepo extends AbstractEntityRepo
{

    /**
     * CountryRepo constructor.
     */
    public function __construct()
    {
        $this->model = new Country();
        parent::__construct();
    }

    /**
     * Create entity relations
     *
     * @param  Country  $entity
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
     * @param  Country  $entity
     * @param $data
     * @return mixed
     */
    protected function updateEntity($entity, $data)
    {
        return $entity;
    }

}
