<?php

namespace App\Validators;

use App\Quota;

class SarasaValidator
{
    public function validate($attribute, $value, $parameters, $validator)
    {
        return Quota::available($value)->count() == 0;
    }
}