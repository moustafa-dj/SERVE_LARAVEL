<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Database\Eloquent\Builder;

Trait FilterTrait
{
    protected Model $model;
    public array $relations = [];
    protected array $scopes = [];

    public function findByAttribute(array $attrs)
    {
        $query = $this->model->newQuery();
        
        foreach ($attrs as $attr => $value) {
            $query->where($attr, $value);
        }

        return $query->get();
    }

    public function setScope(string $scope, $value = null)
    {
        $this->scopes[$scope] = $value;
        return $this;
    }

    public function findById($id)
    {
        $query = $this->model::query()
            ->with($this->relations)
            ->where('id', $id);

        $this->applyScopes($query);

        return $query->firstOrFail();
    }

    public function getAll()
    {
        $query = $this->model::query()
            ->with($this->relations);

        $this->applyScopes($query);

        return $query->get();
    }

    protected function applyScopes(Builder $query)
    {
        foreach ($this->scopes as $scope => $value) {
            if (method_exists($this->model, 'scope'.ucfirst($scope))) {
                $query->{$scope}($value);
            }
        }
    }

    public function withRelations(array $relations)
    {
        $this->relations = $relations;
        return $this;
    }

    public function findBy(array $params)
    {
        $query = $this->model::query()
            ->with($this->relations)
            ->where($params);

        $this->applyScopes($query);

        return $query->firstOrFail();
    }
}
