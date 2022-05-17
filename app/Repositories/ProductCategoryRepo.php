<?php

namespace App\Repositories;

use App\Models\ProductCategory;

/**
 * Class ProductCategory
 *
 * @package App\Repositories
 */
class ProductCategoryRepo extends AbstractEntityRepo
{

    /**
     * ProductCategoryRepo constructor.
     */
    public function __construct()
    {
        $this->model = new ProductCategory();
        parent::__construct();
    }

    /**
     * Create entity relations
     *
     * @param  ProductCategory  $entity
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
     * @param  ProductCategory  $entity
     * @param $data
     * @return mixed
     */
    protected function updateEntity($entity, $data)
    {
        return $entity;
    }

}
