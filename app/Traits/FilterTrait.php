<?php

namespace App\Traits;
use Illuminate\Database\Eloquent\Model;

trait FilterTrait
{

    protected Model $model;
    

    public function findByAttribute(){

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
