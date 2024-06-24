<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderMakeRequest extends FormRequest
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
        $ruls = [
            'location' => 'required|string',
            'client_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
        ];

        return $ruls;
    }
}
