<?php

namespace App\Repositories;

use App\Models\FieldInquiry;

/**
 * Class FieldInquiry
 *
 * @package App\Repositories
 */
class FieldInquiryRepo extends AbstractEntityRepo
{

    /**
     * FieldInquiryRepo constructor.
     */
    public function __construct()
    {
        $this->model = new FieldInquiry();
        parent::__construct();
    }

    /**
     * Create entity relations
     *
     * @param  FieldInquiry  $entity
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
     * @param  FieldInquiry  $entity
     * @param $data
     * @return mixed
     */
    protected function updateEntity($entity, $data)
    {
        return $entity;
    }

}
