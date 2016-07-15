<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MP;

class BuyController extends Controller
{
    public function getIndex(Request $request)
    {
        //dd($request->all());
        $preferenceData = [
            'back_urls' => [
                'success' => route('checkout' , 'success'),
                'failure' => route('checkout', 'failure'),
                'pending' => route('checkout', 'pending')
            ],
            'shipments' => [
                'mode' => (empty($request->input('sarasa'))) ? 'me2' : null,
                'dimensions' => $request->input('dimensiones')
            ],
            'items' => [
                [
                    'title' => $request->input('titulo'),
                    'quantity' => 1,
                    'currency_id' => 'ARS',
                    'unit_price' => (int) $request->input('precio_unitario'),
                    'picture_url' => asset('images/' . $request->input('nombre_img'))
                ]
            ]
        ];

        $preference = MP::create_preference($preferenceData);
        $request->session()->put('preference_id', $preference['response']['id']);
        return redirect()->to($preference['response']['init_point']);
    }

}
