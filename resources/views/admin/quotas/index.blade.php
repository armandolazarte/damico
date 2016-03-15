@extends('admin.layouts.master')

@section('content')
    <div class="pull-right">
        <a class="btn btn-info" href="{{ route('admin.quotas.create') }}">
            <span class="glyphicon glyphicon-plus"></span> Nuevo
        </a>
    </div>

    <h1>Cupos Nodriza</h1>

    <div class="clearfix"></div>

    @include('admin.errors')
    @include('admin.success')

    <table class="table">
        <tr>
            <th>Fecha inicio</th>
            <th>Fecha fin</th>
            <th>Cantidad</th>
            <th>Acciones</th>
        </tr>
        @foreach ($quotas as $quota)
            <tr>
                <td>{{ $quota->start }}</td>
                <td>{{ $quota->end }}</td>
                <td>{{ $quota->size }}</td>
                <td>
                    <ul class="list-inline">
                        <li><a href="{{ route('admin.quotas.edit', $quota->id) }}"><span class="glyphicon glyphicon-pencil"></span></a></li>
                        <li><a href="{{ route('admin.quotas.destroy', $quota->id) }}"><span class="glyphicon glyphicon-trash"></span></a></li>
                    </ul>
                </td>
            </tr>
        @endforeach
    </table>

    <div class="text-center">{!! $quotas->render() !!}</div>

@stop