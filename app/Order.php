<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $fillable = ['customer_name', 'customer_email', 'customer_phone', 'customer_address', 'quantity'];
    
    public function quota()
    {
        return $this->belongsTo('App\Quota', 'id_quota');
    }

    public function paymentMethod()
    {
        return $this->hasOne('App\PaymentMethod', 'id_payment_method');
    }

    public function shippingMethod()
    {
        return $this->hasOne('App\ShippingMethod', 'id_shipping_method');
    }
}
