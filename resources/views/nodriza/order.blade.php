@extends('layouts.master')

@section('content')
    <div class="panel"> 
        <div class="panel-body">
            <h2>Pedido Nodriza</h2>
            @if (empty($active_quota))
                <div class="alert alert-danger">
                    Lo sentimos, actualmente no hay cupo para la Nodriza.
                </div>
            @else
                @include('admin.errors')
                {!! Form::open(['method' => 'post', 'route' => 'nodriza-order-submit']) !!}
                    {!! Form::hidden('_token', csrf_token()) !!}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('customer-name', 'Nombre') !!}
                                {!! Form::text('customer_name', null, ['id' => 'customer-name', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('customer-email', 'E-mail') !!}
                                {!! Form::text('customer-email', null, ['id' => 'customer-email', 'class' => 'form-control']) !!}                        
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('customer-phone', 'Teléfono (opcional)') !!}
                                {!! Form::text('customer_phone', null, ['id' => 'customer-phone', 'class' => 'form-control', 'maxlength' => 20]) !!}
                            </div>
                        </div>
                    </div>
                    <div>
                        {!! Form::button(Lang::get('button.' . action_name()), ['type' => 'submit', 'class' => 'btn btn-info btn-large']) !!}
                    </div>
                {!! Form::close() !!} 
            @endif
        </div>
    </div>
@stop