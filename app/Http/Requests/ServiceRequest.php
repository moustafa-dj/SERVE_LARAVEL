<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'title' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric|min:1|between:0,99.99',
            'domain_id' => 'required|exists:domains,id',
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        if(in_array($this->method() , ['PUT','PATCH'])){
            $ruls = [
                'title' => 'required|string',
                'description' => 'required|string',
                'price' => 'required|numeric|min:1|between:0,99.99',
                'domain_id' => 'required|exists:domains,id',
                'images' => 'nullable',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ];
        }

        return $ruls;
    }
}
