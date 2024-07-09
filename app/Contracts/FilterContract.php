<?php

namespace App\Contracts;

interface FilterContract{

    public function getAll();
    public function findByAttribute(array $attrs);
    public function findById($id);
    public function findBy(array $params);
    public function withRelations(array $relations);
    public function setScope(string $scope, $value = null);    
}