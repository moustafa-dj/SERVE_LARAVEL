<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InterventionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules =[
            'order_id' => 'required|exists:order,id',
            'employee_id' => 'required|array|min:1',
            'employee_id,*'=> 'required|exists:employees,id',
            'equipment_id' => 'required|array|min:1',
            'equipment_id,*'=> 'required|exists:equipments,id'
        ];

        return $rules;
    }
}
