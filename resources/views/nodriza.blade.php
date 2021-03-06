@extends('layouts.master')

@section('content') 
    <div class="panel">
        <div class="panel-body">   
            <h1>Nodriza</h1>
            <div class="row">
                <div class="col-md-8">
                    <p>
                        Fuente de alimentación para 10 pedales, regulada y filtrada para tener el más mínimo nivel de ruido. 
                        Su reducido tamaño nos asegura lugar en cualquier pedalboard para más pedales. Fácil de transportar, la NODRIZA posee un led indicador de estado y está acompañada por un pequeño transformador y 10 cables con conectores rectos y en ángulo de 2.1mm de distintos largos y polaridad negativa al centro (opcional cambio de polaridad y/o conector).
                    </p>
                    <p class="mb20">
                        Como si esto fuera poco, la NODRIZA puede alimentar los stompboxes de Line 6 (DL4, MM4, DM4, etc...) sin ningún problema. 
                        Olvidate de transportar una fuente exclusiva para el DL4 y/o cualquier otro Stompbox Modeler. En fin, <strong><big>¡sin la NODRIZA las demás naves no pueden sonar!</big></strong>
                    </p>
                    <div class="row">
                        @foreach ($data->img as $i => $img)
                            <div class="col-md-4 col-sm-6">
                                <a href="img/{{ $img }}" class="thumbnail" data-toggle="lightbox" data-gallery="nodriza">
                                    <img src="img/{{ $img }}" class="img-responsive" />
                                </a>
                            </div>
                            @if (($i + 1) % 3 == 0)
                                <div class="clearfix hidden-xs hidden-sm"></div>
                            @elseif (($i + 1) % 2 == 0)
                                <div class="clearfix hidden-xs hidden-md hidden-lg"></div>
                            @endif
                        @endforeach
                    </div>
                    <div class="mb20">
                        <p>Precio: <big><strong>${{ $data->unit_price }}</strong></big></p>
                        <p><small><span class="glyphicon glyphicon-registration-mark"></span> Modelo patentado</small></p>
                    </div>
                    @include('buy', ['data' => $data])
                                        
                </div>
                <div class="col-md-4">
                    <div class="info mb20">
                        <dl>
                            <dt>Cantidad de salidas</dt>
                            <dd>10</dd>
                            <dt>Voltaje</dt>
                            <dd>9 volts (no modificable a 12 ni 18 volts)</dd>
                            <dt>Polaridad</dt>
                            <dd>Centro negativo (opcional cambio de polaridad)</dd>
                            <dt>Amperaje total</dt>
                            <dd>1000mA</dd>
                        </dl>
                    </div>
                    <blockquote>
                        <p>Siempre me pareció una picardía ver una pedalboard con una zapatilla llena de transformadores, o con una fuente de importante tamaño ocupando un lugar que tranquilamente podía ser utilizado para más pedales. Por eso, cuando diseñé la Nodriza, traté de que sea lo más pequeña posible y así ocupar el más mínimo espacio en una pedalboard, y a su vez que cumpla perfectamente la función de alimentar y proteger los pedales.</p>
                        <footer>Daniel D'Amico</footer>
                    </blockquote>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">@include('fb_comments')</div>
            </div> 
        </div>
    </div> 

    <script type="text/javascript">
        $(document).on('click', '*[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
    </script>    
@stop