<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Quota;
use Validator;

use App\RuleIdReplacerTrait;

class QuotasController extends Controller
{
    public function __construct()
    {
        Validator::extend('sarasa', 'App\Validators\SarasaValidator@validate');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.quotas.index', ['quotas' => Quota::latest('start')->paginate(2)]);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quotas.create', [
            'form_model' => null,
            'form_route' => 'admin.quotas.store',
            'form_method' => 'post'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $rules = [
            'start' => 'required|dateFormat:d/m/Y|after:yesterday|sarasa:quota,start,end,d/m/Y',
            'end' => 'required|dateFormat:d/m/Y|after:start|sarasa:quota,start,end,d/m/Y',
            'size' => 'required|integer|min:1|max:100'
        ];        
        $validator = Validator::make($request->all(), $rules);
        if ($validator->passes()) {
            $quota = Quota::create($request->all());
            if ($quota->save()) {
                return redirect()
                    ->route('admin.quotas.index')
                    ->with(['success_msg' => trans('Se guardó piola.')]);
            } else {
                return redirect()
                    ->route('admin.quotas.create')
                    ->withInput()
                    ->withErrors(['save' => trans('No se puedo salvar')]);
            }
        } else {
            return redirect()
                ->route('admin.quotas.create')
                ->withInput()
                ->withErrors($validator->messages());
        }

        /*$quota = Quota::create($request->all());
        $quota->save();
        return redirect()
            ->route('admin.quotas.index')
            ->with(['success_msg' => trans('Se guardó piola.')]);*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.quotas.edit', [
            'form_model' => Quota::find($id),
            'form_route' => array('admin.quotas.update', $id),
            'form_method' => 'put'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $quota = Quota::find($id);
        $validator = Validator::make($request->all(), Quota::$rules);
        $a = $validator->passes();
        dd($validator->messages());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
