<?php

namespace App\Traits;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder as QueryBuilder;

trait FilterTrait
{

    protected Model $model;
    

    public function findByAttribute(array $attrs){

        $query = $this->model->newQuery();
        
        foreach($attrs as $attr => $value){
            $query->where($attr, $value);
        }

        return $query->get();
    }

    public function setScops(array $scops){

    }

    public function findById($id)
    {
        return $this->model::findOrFail($id);
    }

    public function getAll(){
        
        return $this->model->all();
    }

}
