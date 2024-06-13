<?php

namespace App\Contracts;

interface BaseContract extends FilterContract{

    public function create(array $data);

    public function update($model , array $data);

    public function destroy($model);
    
}
