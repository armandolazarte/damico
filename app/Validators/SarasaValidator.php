<?php

namespace App\Validators;

use DB;
use Carbon\Carbon;

class SarasaValidator
{
    public function validate($attribute, $value, $parameters, $validator)
    {
        list($table, $start, $end, $format) = $parameters;
        $date = Carbon::createFromFormat($format, $value);
        $id = (!empty($parameters[4])) ? $parameters[4] : null;
        $query = DB::table($table)
            ->where($start, '<=', $date)
            ->where($end, '>=', $date);
        if (!empty($id)) {
            $query->where('id', '!=', $id);
        }
        return $query->count() == 0;
    }
}