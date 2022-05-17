<?php

namespace App\Repositories;

use App\Models\BankBranch;

/**
 * Class BankBranch
 *
 * @package App\Repositories
 */
class BankBranchRepo extends AbstractEntityRepo
{

    /**
     * BankBranchRepo constructor.
     */
    public function __construct()
    {
        $this->model = new BankBranch();
        parent::__construct();
    }

    /**
     * Create entity relations
     *
     * @param  BankBranch  $entity
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
     * @param  BankBranch  $entity
     * @param $data
     * @return mixed
     */
    protected function updateEntity($entity, $data)
    {
        return $entity;
    }

}
