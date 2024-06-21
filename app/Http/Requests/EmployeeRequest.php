<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
        $rules = [

        ];

        if(in_array($this->method(),['PUT','PATCH'])){
            $rules = [
                'username'  => 'nullable|string|max:255',
                'email'     => 'nullable|email|unique:employees,email',
                'password'  => 'nullable|string|min:6',
                'adress'    => 'nullable|string|max:255',
                'phone'     => 'nullable|string|max:255',
                'domain_id' => 'nullable|exists:domains,id',
                'resume'    => 'nullable|mimes:pdf',
            ];
        }
        return $rules;
    }
}
