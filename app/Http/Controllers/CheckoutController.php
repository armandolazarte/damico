<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    
    public function getIndex(Request $request, $result)
    {
        $cond = $request->session()->has('preference_id')
            && $request->has('preference_id')
            && $request->session()->get('preference_id') == $request->input('preference_id');

        if (!$cond) {
            //dd($request->session()->get('preference_id'));
            abort(404);
        }
        
        switch ($result) {
            case 'success':
                $text = 'Gracias por tu compra!';
                $cssClass = 'success';
                break;
            case 'failure':
                if ($request->input('payment_type') == 'null') {
                    return redirect()->route('home');
                }
                $text = 'Ocurrió un error con el pago.';
                $cssClass = 'warning';
            case 'pending':
                $text = 'El pago se encuentra pendiente.';
                $cssClass = 'warning';
                break;
        }
        return view('checkout', [
            'text' => $text,
            'cssClass' => $cssClass
        ]);
    }

}