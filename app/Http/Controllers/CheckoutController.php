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
                $text = trans('alerts.chekcout.success');
                $cssClass = 'success';
                break;
            case 'failure':
                if ($request->input('payment_type') == 'null') {
                    return redirect()->route('home');
                }
                $text = trans('alerts.checkout.failure');
                $cssClass = 'warning';
            case 'pending':
                $text = trans('alerts.checkout.pending');
                $cssClass = 'warning';
                break;
        }
        return view('checkout/index', [
            'text' => $text,
            'cssClass' => $cssClass
        ]);
    }

}