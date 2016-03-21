@extends('admin.layouts.master')

@section('content')
    <h1>Crear cupo Nodriza</h1>

    @include('admin.errors')
    @include('admin.success')
    @include('admin.quotas.form')

@stop