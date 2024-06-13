<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use NunoMaduro\Collision\Adapters\Phpunit\State;
use App\Enums\Domain\Status;
use Illuminate\Validation\Rule;

class DomainRequest extends FormRequest
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
            'name' => 'required|string',
            'description' => 'required|string',
        ];

        if(in_array($this->method() , ['PUT','PATCH'])){
            $rules = [
                'name' => 'nullable|string',
                'description' => 'nullable|string',
                'status' => [Rule::enum(Status::class)],
            ];
        }

        return $rules;
    }
}
