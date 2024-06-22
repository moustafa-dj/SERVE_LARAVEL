<?php

namespace App\Contracts;

interface FilterContract{

    public function getAll();
    public function findByAttribute(array $attrs);
    public function findById($id);
    public function setScops(array $scops);
    
}