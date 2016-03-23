@extends('layouts.master')

@section('content') 
    <div style="color: black; background-color: white; border-radius: 10px; padding: 30px;">   
        <h2>Nodriza</h2>        
        <div class="row">
            <div class="col-md-8">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>


                                <div class="row">
                                    @foreach ($data->img as $i => $img)
                                        <div class="col-md-4 col-sm-6">
                                            <a href="{{ $img }}" class="thumbnail" data-toggle="lightbox" data-gallery="nodriza">
                                                <img src="{{ $img }}" class="img-responsive" />
                                            </a>
                                        </div>
                                        @if (($i + 1) % 3 == 0)
                                            <div class="clearfix hidden-xs hidden-sm"></div>
                                        @elseif (($i + 1) % 2 == 0)
                                            <div class="clearfix hidden-xs hidden-md hidden-lg"></div>
                                        @endif
                                    @endforeach
                                </div>
             
            </div>
            <div class="col-md-4">

                <blockquote>
                    <p>Siempre me pareció una picardía ver una pedalboard con una zapatilla llena de transformadores, o con una fuente de importante tamaño ocupando un lugar que tranquilamente podía ser utilizado para más pedales. Por eso, cuando diseñé la Nodriza, traté de que sea lo más pequeña posible y así ocupar el más mínimo espacio en una pedalboard, y a su vez que cumpla perfectamente la función de alimentar y proteger los pedales.</p>
                    <footer>Daniel D'Amico</footer>
                </blockquote>   

                <!--<p>Precio: <big><strong>$1450</strong></big></p>-->
                <!--<button class="btn btn-large btn-block btn-info">QUIERO!</button>-->

            <!--<p>Podés pedir tu Nodriza completando el siguiente formulario:</p>
            @if (empty($active_quota))
                <div class="alert alert-danger">
                    Lo sentimos, actualmente no hay cupo para la Nodriza.
                </div>
            @else
                {!! Form::open(['method' => 'post', 'route' => 'nodriza-order-submit']) !!}
                    {!! Form::hidden('_token', csrf_token()) !!}
                    <!--<div class="form-group">
                        {!! Form::label('customer-name', 'Nombre') !!}
                        {!! Form::text('customer_name', null, ['id' => 'customer-name', 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('customer-email', 'E-mail') !!}
                        {!! Form::text('customer-email', null, ['id' => 'customer-email', 'class' => 'form-control']) !!}                        
                    </div>
                    <div class="form-group">
                        {!! Form::label('customer-phone', 'Teléfono (opcional)') !!}
                        {!! Form::text('customer_phone', null, ['id' => 'customer-phone', 'class' => 'form-control', 'maxlength' => 20]) !!}
                    </div>
                    {!! Form::button(Lang::get('button.' . action_name()), ['type' => 'submit', 'class' => 'btn btn-info btn-large']) !!}
                {!! Form::close() !!} 
            @endif
                                    
            <!--</div>-->
        </div> 
    </div> 

    <script type="text/javascript">
        $(document).on('click', '*[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
    </script>    
@stop