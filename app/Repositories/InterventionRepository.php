<?php

namespace App\Repositories;

use App\Contracts\InterventionContract;
use App\Models\Intervention;

class InterventionRepository extends BaseRepository implements InterventionContract {

    protected Intervention $intervention;

    public function __construct(Intervention $intervention)
    {
        $this->intervention = $intervention;
        
        parent::__construct($intervention);
    }

    public function create(array $data)
    {
        $intervention = $this->intervention->create($data);

        if(array_key_exists('employee_id' , $data)){
            $intervention->employees()->sync($data["employee_id"]);
        }

        if(array_key_exists('equipment_id' , $data)){
            $intervention->equipments()->sync($data["equipment_id"]);
        }
        return $intervention;
    }

    public function update($intervention , array $data)
    {
        $intervention = $this->findById($intervention);

        $intervention->update($data);

        return $intervention;
    }

    public function destroy($id)
    {
        $intervention = $this->findById($id);

        $intervention->delete($intervention);
    }

}