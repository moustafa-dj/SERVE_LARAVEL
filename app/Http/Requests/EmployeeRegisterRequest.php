<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRegisterRequest extends FormRequest
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
            'username'  => 'required|string|max:255',
            'email'     => 'required|email|unique:employees,email',
            'password'  => 'required|string|min:6',
            'adress'    => 'required|string|max:255',
            'phone'     => 'required|string|max:255',
            'domain_id' => 'required|exists:domains,id',
            'resume'    => 'required|mimes:pdf',
        ];
        return $rules;
    }
}
