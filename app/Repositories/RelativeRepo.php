<?php

namespace App\Repositories;

use App\Models\Relative;

/**
 * Class Relative
 *
 * @package App\Repositories
 */
class RelativeRepo extends AbstractEntityRepo
{

    /**
     * RelativeRepo constructor.
     */
    public function __construct()
    {
        $this->model = new Relative();
        parent::__construct();
    }

    /**
     * Create entity relations
     *
     * @param  Relative  $entity
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
     * @param  Relative  $entity
     * @param $data
     * @return mixed
     */
    protected function updateEntity($entity, $data)
    {
        return $entity;
    }

}
