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
            'size' => 'required|integer|min:1|max:100'
        ]);
        //var_dump($request->input('start'));
        if ($validator->passes()) {
            $quota = Quota::create($request->all());
            //var_dump($quota->start);
            if ($quota->save()) {
                //die();
                return redirect()
                    ->route('admin.quotas.create')
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
        //
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
