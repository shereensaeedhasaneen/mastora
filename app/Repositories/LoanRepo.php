<?php

namespace App\Repositories;

use App\Models\Loan;

/**
 * Class Loan
 *
 * @package App\Repositories
 */
class LoanRepo extends AbstractEntityRepo
{

    /**
     * LoanRepo constructor.
     */
    public function __construct()
    {
        $this->model = new Loan();
        parent::__construct();
    }

    /**
     * Create entity relations
     *
     * @param  Loan  $entity
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
     * @param  Loan  $entity
     * @param $data
     * @return mixed
     */
    protected function updateEntity($entity, $data)
    {
        return $entity;
    }

}
