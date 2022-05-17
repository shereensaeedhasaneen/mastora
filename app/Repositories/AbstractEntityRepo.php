<?php

namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;
use Exception;

abstract class AbstractEntityRepo extends AbstractRepository implements RepositoryInterface
{
    /**
     * Abstract create Entity Handling.
     *
     * @param array $data
     * @param bool $disableMysqlTransactions
     * @return EloquentModel
     * @throws \Throwable
     */
    public function create($data, $disableMysqlTransactions = false)
    {
        $item = $this->model;
        $creation = function () use (&$item, $data) {
            $model = $this->createModel($data);
            $this->saveItemLanguage($model, $data);
            $item = $this->createEntity($model, $data);
        };

        if (! $disableMysqlTransactions) {
            DB::transaction($creation);
        } else {
            $creation();
        }

        return $item;
    }

    /**
     * Update entity details.
     *
     * @param $idOrModel
     * @param $data
     * @param bool $disableMysqlTransactions
     * @return EloquentModel
     * @throws \Throwable
     */
    public function update($idOrModel, $data, $disableMysqlTransactions = false)
    {
        $item = $this->getItem($idOrModel);
        if (! $item->id) {
            return $this->create($data);
        }

        $updating = function () use (&$item, $data) {
            // Update name of base entity on fallback language only
            if (app()->getLocale() != $item->{config('repo.translation.local_field_key')} && $this->modelHasLanguage()) {
                $item->fillable(array_diff($item->getFillable(), $this->getInteractEntityLangFields()));
            }
            // Check if entity does not have any fillable attribute to prevent the default *
            if (count($item->getFillable())) {
                $this->modify($item, $data);
            }

            $this->saveItemLanguage($item, $data, true);
            $item = $this->updateEntity($item, $data);
        };

        // Check for using transaction or not.
        (! $disableMysqlTransactions) ? DB::transaction($updating) : $updating();

        return $item;
    }

    /**
     * Create entity.
     *
     * @param $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    protected function save($data)
    {
        return parent::create($data);
    }

    /**
     * Modify Entity.
     *
     * @param $idOrModel
     * @param $data
     * @return EloquentModel
     */
    protected function modify($idOrModel, $data)
    {
        return parent::update($idOrModel, $data);
    }

    /**
     * Create model to enable custom handling.
     *
     * @param $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    private function createModel($data)
    {
        $createEntityMethodName = 'create'.class_basename(get_class($this->model));
        if (method_exists($this, $createEntityMethodName)) {
            return $this->{$createEntityMethodName}($data);
        }

        return parent::create($data);
    }

    /**
     * Save language relation if exist
     *
     * @param EloquentModel $item
     * @param array $data
     * @param bool $update
     */
    protected function saveItemLanguage(EloquentModel $item, $data, $update = false)
    {
        if ($this->modelHasLanguage()) {
            $languageModel = $this->getModelLanguageClass();
            $modelLang = new $languageModel;

            foreach ($modelLang->getFillable() as $fillable) {
                if (array_key_exists($fillable, $data)) {
                    $data[config('repo.translation.relation')][$fillable] = $data[$fillable];
                }
            }
            $this->saveItemRelation($item, $data, config('repo.translation.relation'), $update);
        }
    }

    /**
     * Check model has language or not.
     *
     * @return bool
     */
    protected function modelHasLanguage(): bool
    {
        return class_exists($this->getModelLanguageClass()) ? true : false;
    }

    /**
     * Get model language class name.
     *
     * @return string
     */
    protected function getModelLanguageClass()
    {
        return get_class($this->model).config('repo.translation.model_key_name');
    }

    /**
     * Get array of intersection of fillable of model and fillable of language relation
     *
     * @return array
     */
    protected function getInteractEntityLangFields(): array
    {
        if ($this->modelHasLanguage()) {
            $languageModel = $this->getModelLanguageClass();
            $modelLang = new $languageModel;
            $intersection = array_intersect($this->model->getFillable(), $modelLang->getFillable());

            return $intersection;
        }

        return [];
    }

    /**
     * Save item relation if exist
     *
     * @param \Illuminate\Database\Eloquent\Model $item
     * @param array $data
     * @param string $relationName
     * @param bool $update
     */
    protected function saveItemRelation(EloquentModel $item, $data, $relationName, $update = false)
    {
        // if $relationName is array
        if (is_array($relationName) && count($relationName)) {
            foreach ($relationName as $relation) {
                $this->saveItemRelation($item, $data, $relation, $update);
            }

            return;
        }
        // Save model $relationName if exist
        if (isset($data[$relationName])) {
            return $update ? $item->{$relationName}()->updateOrCreate([], $data[$relationName]) : $item->{$relationName}()->create($data[$relationName]);
        }
    }

    /**
     * Sort by language.
     *
     * @param $field
     *     Field name to sort result by.
     * @param string $type
     *     Sort type asc or desc.
     * @return $this
     * @throws Exception
     */
    protected function sortByLanguage($field, $type = 'asc')
    {
        if (! $this->modelHasLanguage()) {
            $model = class_basename($this->model);
            throw new Exception("{$model} model doesn't has a relation with language.");
        }
        $table = $this->model->getTable();
        $langTable = resolve($this->getModelLanguageClass())->getTable();
        $field = "{$langTable}.{$field}";
        $this->getQuery()->leftJoin($langTable, function (JoinClause $query) use ($langTable, $table) {
            $query->on("{$table}.id", '=', "{$langTable}.{$table}_id");
            $query->where("{$langTable}.lang_code", \app()->getLocale());
        })->selectRaw("{$table}.*")->orderByRaw("{$field} IS NULL, {$field} {$type}");

        return $this;
    }

    /**
     * Create entity relations
     *
     * @param EloquentModel $model
     * @param $data
     * @return mixed
     */
    abstract protected function createEntity($model, $data);
    /**
     * Update entity relation
     *
     * @param EloquentModel $entity
     * @param $data
     * @return mixed
     */
    abstract protected function updateEntity($entity, $data);
}
