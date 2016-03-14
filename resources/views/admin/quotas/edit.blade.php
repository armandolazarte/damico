@extends('admin.layouts.master')

@section('content')
    <h1>Editar cupo Nodriza</h1>

    @include('admin.errors')
    @include('admin.success')
    @include('admin.quotas.form', ['model' => $model])

@stop