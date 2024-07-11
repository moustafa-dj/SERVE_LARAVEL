<?php

namespace App\Contracts;

interface InterventionContract extends BaseContract{

    public function confirm($id);

    public function detachEmployee($employee_id , $intervention_id);

    public function detachEquipment($equipment_id , $id);

    public function engage($intervention_id , $employee_id);

    public function decline($intervention_id , $employee_id);

    public function cancele($id);

    public function refuse($id);


}