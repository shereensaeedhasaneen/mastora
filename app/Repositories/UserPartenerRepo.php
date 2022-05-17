<?php

namespace App\Repositories;

use App\Models\UserPartener;

/**
 * Class UserPartener
 *
 * @package App\Repositories
 */
class UserPartenerRepo extends AbstractEntityRepo
{

    /**
     * UserPartenerRepo constructor.
     */
    public function __construct()
    {
        $this->model = new UserPartener();
        parent::__construct();
    }

    /**
     * Create entity relations
     *
     * @param  UserPartener  $entity
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
     * @param  UserPartener  $entity
     * @param $data
     * @return mixed
     */
    protected function updateEntity($entity, $data)
    {
        return $entity;
    }

}
