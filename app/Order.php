<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $fillable = ['customer_name', 'customer_email', 'customer_phone', 'customer_address'];
    
    public function quota()
    {
        return $this->belongsTo('Quota');
    }

    public function paymentMethod()
    {
        return $this->hasOne('PaymentMethod');
    }

    public function shippingMethod()
    {
        return $this->hasOne('ShippingMethod');
    }
}
