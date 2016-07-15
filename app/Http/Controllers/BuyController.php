<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MP;

class BuyController extends Controller
{
    public function getIndex(Request $request)
    {
        //dd($request->all());
        $unit_price = (int) $request->input('precio_unitario');
        $title = $request->input('titulo');

        if (!empty($request->input('interlock'))) {
            $unit_price += config('app.interlock_additional_cost');
            $title .= ' + Adicional Interlock';
        }

        $preferenceData = [
            'back_urls' => [
                'success' => route('checkout' , 'success'),
                'failure' => route('checkout', 'failure'),
                'pending' => route('checkout', 'pending')
            ],
            'shipments' => [
                'mode' => (empty($request->input('pickup'))) ? 'me2' : null,
                'dimensions' => $request->input('dimensiones')
            ],
            'items' => [
                [
                    'title' => $title,
                    'quantity' => 1,
                    'currency_id' => 'ARS',
                    'unit_price' => $unit_price,
                    'picture_url' => asset('images/' . $request->input('nombre_img'))
                ]
            ]
        ];

        $preference = MP::create_preference($preferenceData);
        return redirect()->to($preference['response']['init_point']);
    }

}
