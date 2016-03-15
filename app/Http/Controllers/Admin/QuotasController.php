<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Quota;
use Validator;

class QuotasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.quotas.index', ['quotas' => Quota::orderBy('start', 'desc')->paginate(2)]);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quotas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::extend('sarasa', 'App\Validators\SarasaValidator@validate');
        $validator = Validator::make($request->all(), [
            'start' => 'required|dateFormat:d/m/Y|after:yesterday|sarasa',
            'end' => 'required|dateFormat:d/m/Y|after:start|sarasa',            
            'size' => 'required|integer|min:1|max:100',
        ], [
            'start.required' => 'La fecha de inicio es requerida.',
            'start.dateFormat' => 'La fecha de inicio debe responder al formato DD/MM/AA.',
            'start.after' => 'La fecha de inicio debe ser al menos hoy.',
            'end.required' => 'La fecha de fin es requerida.',
            'end.dateFormat' => 'La fecha de fin debe responder al formato DD/MM/AA.',
            'end.after' => 'La fecha de fin debe ser posterior a la de inicio.',
            'size.max' => 'La cantidad no puede ser mayor que 100.',
            'size.min' => 'La cantidad debe ser al menos 1.',
            'size.required' => 'La cantidad es requerida.',
            'size.integer' => 'La cantidad debe ser un número entero.'
        ]);
        if ($validator->passes()) {
            $quota = Quota::create($request->all());
            if ($quota->save()) {
                return redirect()
                    ->route('admin.quotas.index')
                    ->with(['success_msg' => 'Se guardó piola.']);
            } else {
                return redirect()
                    ->route('admin.quotas.create')
                    ->withInput()
                    ->withErrors(['save' => 'No se puedo salvar']);
            }
        } else {
            return redirect()
                ->route('admin.quotas.create')
                ->withInput()
                ->withErrors($validator->errors()->all());
        }
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
        return view('admin.quotas.edit', ['model' => Quota::find($id)]);
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
        //
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
