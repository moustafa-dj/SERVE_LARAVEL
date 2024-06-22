<?php

namespace App\Contracts;

interface FilterContract{

    public function getAll();
    public function findByAttribute();
    public function findById($id);
    public function setScops(array $scops);
    
}