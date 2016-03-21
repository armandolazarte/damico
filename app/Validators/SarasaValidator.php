<?php

namespace App\Validators;

use DB;

class SarasaValidator
{
    public function validate($attribute, $value, $parameters, $validator)
    {
        $query = DB::table($parameters[0])
            ->where($parameters[1], '<=', $value)
            ->where($parameters[2], '>=', $value);
        if (!empty($parameters[3])) {
            $query->where('id', '!=', $parameters[3]);
        }
        return $query->count() == 0;
    }
}