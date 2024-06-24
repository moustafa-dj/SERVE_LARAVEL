<?php

namespace App\Repositories;

use App\Contracts\EquipmentContract;
use App\Models\Equipment;

class EquipmentRepository extends BaseRepository implements EquipmentContract {

    protected Equipment $equipment;

    public function __construct(Equipment $equipment)
    {
        $this->equipment = $equipment;
        
        parent::__construct($equipment);
    }

    public function create(array $data)
    {
        $equipment = $this->equipment->create($data);

        return $equipment;
    }

    public function update($equipment , array $data)
    {
        $equipment = $this->findById($equipment);

        $equipment->update($data);

        return $equipment;
    }

    public function destroy($id)
    {
        $equipment = $this->findById($id);

        $equipment->delete($equipment);
    }

}