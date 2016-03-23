<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Dryval\ValidationTrait;

class Quota extends Model
{
    //use ValidationTrait;

    protected $table = 'quota';
    protected $fillable = ['start', 'end', 'size', 'available'];
    protected $dates = ['start', 'end'];

    /*public static $rules = [
        'start' => 'required|after:yesterday|sarasa:quota,start,end,:id:',
        'end' => 'required|after:start|sarasa:quota,start,end,:id:',
        'size' => 'required|integer|min:1|max:100'
    ];*/
    
    public function orders()
    {
        return $this->hasMany('Order');
    }

    public function setStartAttribute($value)
    {
        $this->attributes['start'] = Carbon::createFromFormat('d/m/Y', $value);
    }

    public function setEndAttribute($value)
    {
        $this->attributes['end'] = Carbon::createFromFormat('d/m/Y', $value);
    }

    public function setAvailableAttribute()
    {
        $this->attributes['available'] = $this->attributes['size'];
    }    

    public function getStartAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function getEndAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function scopeActive($query)
    {
        $today = Carbon::today();
        return $query->available($today);
    }

    public function scopeAvailable($query, Carbon $date)
    {
        return $query
            ->where('start', '<=', $date)
            ->where('end', '>=', $date)
            ->where('available', '>', 0);
    }
}
