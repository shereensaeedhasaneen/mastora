<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Class AbstractRepository
 *
 * @package App\Repositories
 */
interface RepositoryInterface
{
    /**
     * Create new entity.
     *
     * @param $data
     * @return Model
     */
    public function create($data);

    /**
     * Create new record or ignore when PK exist
     *
     * @param $data
     * @return \Illuminate\Support\Collection
     */
    public function createOrIgnore($data);

    /**
     * Sync group of records.
     *
     * @param array $complexFilter
     * @param $data
     * @throws \Throwable
     */
    public function syncByBundle($data, $complexFilter);

    /**
     * Update entity by model or entity id
     *
     * @param $idOrModel
     * @param $data
     * @return Model
     */
    public function update($idOrModel, $data);

    /**
     * Update or create new entity
     *
     * @param $data
     * @param $attributes
     * @return Model
     */
    public function updateOrCreate($data, $attributes);

    /**
     * Get all records
     *
     * @param array $with
     * @param array $complexFilter
     * @param bool $returnResults return results collection if true, query object if false
     * @param null|array $sort content of array is $sort['field'] and $sort['type']
     * @return Collection
     */
    public function findAll($with = [], $complexFilter = [], $returnResults = true, $sort = []);

    /**
     * Find many by ids
     *
     * @param $ids
     * @param array $with
     * @param bool $returnResults
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Collection|static[]
     */
    public function findMany($ids, array $with = [], $returnResults = true);

    /**
     * Find a record by a specific key
     *
     * @param array $with
     * @param array $complexFilter
     * @return \Illuminate\Database\Eloquent\Model|null|object|static
     */
    public function findOneBy($with = [], $complexFilter = []);

    /**
     * Find a record by a specific key of Fail
     *
     * @param array $with
     * @param array $complexFilter
     * @return \Illuminate\Database\Eloquent\Model|static
     */
    public function findOneByOrFail($with = [], $complexFilter = []);

    /**
     * Delete a record by id
     *
     * @param $id
     * @return int
     */
    public function delete($id);

    /**
     * Delete all recodes.
     *
     * @param array $data
     * @throws \Exception
     */
    public function deleteAll($data);

    /**
     * Find all with pagination page
     *
     * @param array $with
     * @param array $complexFilter
     * @param int $perPage
     * @param array $sort
     * @return mixed
     */
    public function paginate($with = [], $complexFilter = [], $perPage = 15, $sort = []);

    /**
     * First or create model
     *
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function firstOrCreate(array $data);
}
