<?php

namespace App\Repositories;

use App\Contracts\InterventionContract;
use App\Models\Employee;
use App\Models\Intervention;

class InterventionRepository extends BaseRepository implements InterventionContract {

    protected Intervention $intervention;
    protected Employee $employee;

    public function __construct(
        Intervention $intervention,
        Employee $employee
        )
    {
        $this->intervention = $intervention;
        $this->employee = $employee;
        
        parent::__construct($intervention);
    }

    public function create(array $data)
    {
        $intervention = $this->intervention->create($data);

        if(array_key_exists('employee_id' , $data)){
            $intervention->employees()->attach($data["employee_id"]);
        }

        if(array_key_exists('equipment_id' , $data)){
            $intervention->equipments()->attach($data["equipment_id"]);
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

    public function detachEmployee($employee_id , $intervention_id)
    {
        $intervention = $this->findById($intervention_id);

        $intervention->employees()->detach($employee_id);
    }

    public function detachEquipment($equipment_id , $intervention_id)
    {
        $intervention = $this->findById($intervention_id);

        $intervention->equipments()->detach($equipment_id);
    }

}