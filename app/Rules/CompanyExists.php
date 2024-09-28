<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Company;

class CompanyExists implements Rule
{
   
    public function passes($attribute, $value)
    {
        return Company::where('id', $value)->exists();
    }

    public function message()
    {
        return 'La compañía no existe.';
    }
}