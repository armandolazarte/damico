@extends('layouts.master')

@section('content') 
    <div class="panel">   
        <div class="panel-body">
            <h2>Plataformas</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            <div class="row">
                <div class="col-md-8">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#grande" aria-controls="grande" role="tab" data-toggle="tab">GRANDE 65x35</a></li>
                        <li role="presentation"><a href="#mediana" aria-controls="mediana" role="tab" data-toggle="tab">MEDIANA 50x30</a></li>
                        <li role="presentation"><a href="#chica" aria-controls="chica" role="tab" data-toggle="tab">CHICA 35x30</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content" style="padding: 20px;">
                        @foreach ($types as $type)
                            <div role="tabpanel" class="tab-pane<?php if ($type->name == 'grande') { echo ' active'; } ?>" id="{{ $type->name }}">
                                <div class="row">
                                    @foreach ($type->images as $i => $img)
                                        <div class="col-md-4 col-sm-6">
                                            <a href="{{ $img }}" class="thumbnail" data-toggle="lightbox" data-gallery="{{ $type->name }}">
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
                                <div>Precio: <big><strong>${{ $type->price }}</strong></big></div>
                            </div>
                        @endforeach
                    </div>

                    <h3>La gente anda diciendo</h3>
                    <div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="10" data-width="100%"></div>

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
                            <li>Opcional alimentación directa a 220v por cable interlock ($200).</li>
                        </ul>
                    </div>
                </div>          
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