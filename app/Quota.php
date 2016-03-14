<?php

namespace App;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Quota extends Model
{
    protected $table = 'quota';
    protected $fillable = ['start', 'end', 'size'];
    protected $dates = ['start', 'end'];
    protected $dateFormat = 'd/m/Y';
    
    public function scopeActive($query)
    {
        $today = Carbon::today();
        return $query->available($today);
    }

    public function scopeAvailable($query, $date)
    {
        return $query
            ->where('start', '<=', $date)
            ->where('end', '>=', $date);
    }
}
