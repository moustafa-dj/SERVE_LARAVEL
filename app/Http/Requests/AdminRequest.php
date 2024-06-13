<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
                'name' => 'nullable|string|max:255',
                'email'=> 'nullable|email',
                'phone'=> 'nullable|string|max:255',
                'about'=> 'nullable|string|max:255',
                'adress'=> 'nullable|string|max:255',
                'full_name' => 'nullable|string|max:255',
                'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048'
            ];
        }
        return $rules;
    }
}
