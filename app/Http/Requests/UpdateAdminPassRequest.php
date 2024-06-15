<?php

namespace App\Http\Requests;

use App\Rules\CurrentPasswordCheck;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminPassRequest extends FormRequest
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
            'current_password' => ['required','string' , new CurrentPasswordCheck],
            'password' => 'required|string|min:8|confirmed',
        ];

        return $rules;
    }
}
