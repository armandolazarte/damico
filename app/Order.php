<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [];
    //protected $dates = ['start', 'end'];
    //protected $dateFormat = 'd/m/Y';
    
    public function quota()
    {
        return $this->belongsTo('Quota');
    }
}
