<?php

namespace App\Repositories;

use App\Contracts\FilterContract;
use App\Traits\FilterTrait;
use Illuminate\Database\Eloquent\Model;


class BaseRepository implements FilterContract {

    use FilterTrait;


    public function __construct(Model $model)
    {
        $this->model = $model;
    }


}