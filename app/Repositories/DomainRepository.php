<?php

namespace App\Repositories;

use App\Contracts\DomainContract;
use App\Models\Domain;
use App\Enums\Domain\Status;

class DomainRepository implements DomainContract {

    protected Domain $model;

    public function __construct(Domain $model)
    {
        $this->model = $model;
    }

    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function getAll(){
        
        return $this->model->all();
    }
    public function findByAttribute(){}

    public function create(array $data)
    {
        $data["status"] = Status::ACTIVE;

        $domain = $this->model->create($data);

        return $domain;
    }

    public function update($model , array $data)
    {
        $domain = $this->findById($model);

        $domain->update($data);

        return $domain;
    }

    public function destroy($id)
    {
        $domain = $this->findById($id);

        $domain->delete($domain);
    }

}