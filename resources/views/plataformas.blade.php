@extends('layouts.master')

@section('content') 
    <div class="panel">   
        <div class="panel-body">
            <h1>Plataformas</h1>
            <div class="row">
                <div class="col-md-8">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#pla-gra" aria-controls="pla-gra" role="tab" data-toggle="tab">GRANDE 65x35</a></li>
                        <li role="presentation"><a href="#pla-med" aria-controls="pla-med" role="tab" data-toggle="tab">MEDIANA 50x30</a></li>
                        <li role="presentation"><a href="#pla-chi" aria-controls="pla-chi" role="tab" data-toggle="tab">CHICA 35x30</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content" style="padding: 20px;">
                        @foreach ($types as $type)
                            <div role="tabpanel" class="tab-pane<?php if ($type->code == 'pla-gra') { echo ' active'; } ?>" id="{{ $type->code }}">
                                <div class="row">
                                    @foreach ($type->images as $i => $img)
                                        <div class="col-md-4 col-sm-6">
                                            <a href="img/{{ $img }}" class="thumbnail" data-toggle="lightbox" data-gallery="{{ $type->code }}">
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
                                    <p>Precio: <big><strong>${{ $type->unit_price }}</strong></big></p>
                                    <p>Entran {{ $type->pedal_count }} pedales de tipo Boss/MXR.</p>
                                    <p><small><span class="glyphicon glyphicon-registration-mark"></span> Modelo patentado</small></p>
                                </div>                                
                                @include('buy', ['data' => $type])                              
                            </div>
                        @endforeach
                    </div>                    

                </div>
                <div class="col-md-4">
                    <div class="info mb20">
                        <h3>Características</h3>                    
                        <ul>
                            <li>Bolso de transporte reforzado.</li>
                            <li>Velcro autoadhesivo para fijar los pedales.</li>
                            <li>Patas de goma antideslizantes.</li>
                            <li>Ranuras laterales para fácil manipulación.</li>
                            <li>Ranuras frontales para facilitar la conexión de cables interpedales y de alimentación, ahorrando espacio y mateniendo prolijidad y seguridad en el set.</li>
                            <li>Inclinación para un mejor acceso a los pedales más lejanos.</li>
                            <li>Posibilidad de alojar fuentes, sistemas inalámbricos, etc. debajo de la PLATAFORMA, logrando más lugar en la superficie.</li>
                            <li>Para los exigentes del vivo, adhesivo fluorescente para señalizar la PLATAFORMA, pedales, controles y todos esos lugares que se necesita ver para optimizar el desempeño sobre el escenario.</li>
                        </ul>
                    </div>
                    <div class="info mb20">
                        <h3>Consideraciones</h3>                    
                        <ul>
                            <li>Las medidas de las Plataformas son de fábrica. No hacemos tamaños a pedido ni las personalizamos con nombres.</li>
                            <li>Las Plataformas no traen la Nodriza incluída. Son dos productos diferentes que se pueden combinar en una misma compra.</li>
                        </ul>
                    </div>                    
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