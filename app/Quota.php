<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Quota extends Model
{
    protected $table = 'quota';
    protected $fillable = ['start', 'end', 'size'];
    protected $dates = ['start', 'end'];
    //protected $dateFormat = 'd/m/Y';
    
    public function setStartAttribute($value)
    {
        $this->attributes['start'] = Carbon::createFromFormat('d/m/Y H:i:s', $value . ' 00:00:00');
    }

    public function setEndAttribute($value)
    {
        $this->attributes['end'] = Carbon::createFromFormat('d/m/Y H:i:s', $value . ' 00:00:00');
    }      

    public function scopeActive($query)
    {
        $today = Carbon::today();
        return $query->available($today);
    }

    public function scopeAvailable($query, $date)
    {
        $date = Carbon::createFromFormat('d/m/Y', $date);
        return $query
            ->where('start', '<=', $date)
            ->where('end', '>=', $date);
    }
}
