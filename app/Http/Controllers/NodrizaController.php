<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Validator;

use App\Quota;

class NodrizaController extends Controller
{
    public function getIndex()
    {
        $active = Quota::active()->first();
        $data = json_decode(file_get_contents('data/nodriza.json'));
        return view('nodriza.index', [
            'active_quota' => $active,
            'data' => $data
        ]);        
        return view('nodriza.index');
    }

    public function getOrder()
    {
        $active = Quota::active()->first();        
        return view('nodriza.order', [
            'active_quota' => $active
        ]);
    }

    public function postOrder(Request $request)
    {
        $activeQuota = Quota::active()->first();
        if (empty($activeQuota)) {
            return redirect()->route('nodriza-order');
        }
        $rules = [
            'customer_name' => 'required',
            'customer_email' => 'required|email',
            //'customer_phone' => 
            'id_shipping_method' => 'required_if:shipping,yes|exists:shipping_method,id',
            'id_payment_method' => 'required_if:shipping,yes|exists:payment_method,id',
            'customer_address' => 'required_if:shipping,yes',
            /*'city' => 'required_if:shipping,yes',
            'province' => 'required_if:shipping,yes',
            'zipcode' => 'required_if:shipping,yes|alphanumeric|between:4,8',*/
            'quantity' => 'required|numeric|between:1,5',
        ];        
        $validator = Validator::make($request->all(), $rules);
        if ($validator->passes()) {
            $order = Order::create($request->all());
            $order->quota()->associate($activeQuota);
            $paymentMethod = PaymentMethod::find($request->get('id_payment_method'));
            $order->paymentMethod()->associate($paymentMethod);
            $shippingMethod = PaymentMethod::find($request->get('id_shipping_method'));
            $order->shippingMethod()->associate($shippingMethod);
            if ($order->save()) {
                return redirect()->route('nodriza-order-submitted');
            } else {

            }
        } else {
            return redirect()->back()->withInput()->withErrors($validator->messages());
        }
    }

    public function getOrderSubmitted()
    {
        return view('nodriza.order_submitted');
    }
}
