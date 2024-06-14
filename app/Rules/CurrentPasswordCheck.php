<?php

namespace App\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CurrentPasswordCheck implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $user = Auth::user();

        if (!Hash::check($value, $user->password)) {
            $fail('The provided current password is incorrect.');
        }
    }
}
