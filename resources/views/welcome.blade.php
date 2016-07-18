@extends('layouts.master')

@section('content')             

    <div id="carousel-home" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach ($carousel_imgs as $k => $img)
                <li data-target="#carousel-home" data-slide-to="{{ $k }}" class="<?php if ($k == 0) { echo ' active'; } ?>"></li>
            @endforeach
        </ol>

        <div class="carousel-inner" role="listbox">
            @foreach ($carousel_imgs as $k => $img)
                <div class="item<?php if ($k == 0) { echo ' active'; } ?>">
                    <img src="img/{{ $img->file }}" alt="..." style="max-width: 100%; width: 100%; max-height: 200px; vertical-align: middle;" />
                    <div class="carousel-caption">
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <p style="margin-top: 40px;">
        Somos una empresa argentina dedicada a la fabricación de equipamiento para guitarristas y bajistas. 
        Si bien a principios de 2010 la principal actividad era la fabricación de pedales, hoy en día estamos avocados 
        a todo lo que es necesario para que un sistema de efectos funcione en forma correcta y cómoda, ofreciendo al 
        público la fuente de alimentación Nodriza, Plataformas para pedales y linkeo y armado de sistemas de efectos, 
        tanto en la línea de alimentación como en la de audio. Todo firme y prolijo para que sólo te preocupes 
        por tocar.
    </p>

@stop              
