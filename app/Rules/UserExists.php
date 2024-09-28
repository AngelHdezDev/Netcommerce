<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

use Illuminate\Contracts\Validation\Rule;

use App\Models\User;

class UserExists implements Rule
{
    public function passes($attribute, $value)
    {
        return User::where('id', $value)->exists();
    }

    public function message()
    {
        return 'El usuario no existe.';
    }
}
