<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MP;

class BuyController extends Controller
{
    public function getIndex(Request $request)
    {
        $code = $request->input('codigo');

        if (in_array($code, ['pla-gra', 'pla-med', 'pla-chi']) !== false) {
            $json = json_decode(file_get_contents('data/plataformas.json'));
            $key = array_search($code, array_column($json, 'code'));
            $data = $json[$key];
        } elseif ($code == 'nod') {
            $data = json_decode(file_get_contents('data/nodriza.json'));            
        } else {
            return redirect()->route('home');
        }

        $unit_price = $data->unit_price;
        $title = $data->title;

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
                'dimensions' => $data->dimensions
            ],
            'items' => [
                [
                    'title' => $title,
                    'quantity' => 1,
                    'currency_id' => 'ARS',
                    'unit_price' => $unit_price,
                    'picture_url' => asset('images/' . $data->picture_name)
                ]
            ]
        ];

        $preference = MP::create_preference($preferenceData);
        $request->session()->put('preference_id', $preference['response']['id']);
        return redirect()->to($preference['response']['init_point']);
    }

}
