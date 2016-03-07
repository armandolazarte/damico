@extends('layouts.master')

@section('content')             

    <div id="carousel-home" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-home" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-home" data-slide-to="1"></li>
            <li data-target="#carousel-home" data-slide-to="2"></li>
            <li data-target="#carousel-home" data-slide-to="3"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            @foreach ($carousel_imgs as $k => $img)
                <div class="item<?php if ($k == 0) { echo ' active'; } ?>">
                    <img src="{{ $img->file }}" alt="..." />
                    <div class="carousel-caption">
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <p style="margin-top: 40px;">Somos una empresa argentina dedicada a la fabricación de equipamiento para guitarristas y bajistas. Si bien a principios de 2010 la principal actividad era la fabricación de pedales, hoy en día estamos avocados a todo lo que es necesario para que un sistema de efectos funcione en forma correcta y cómoda, ofreciendo al público la fuente de alimentación Nodriza, Plataformas para pedales y linkeo y armado de sistemas de efectos, tanto en la línea de alimentación como en la de audio, todo firme y prolijo para que solo te preocupes por tocar.</p>
    <p>Contamos con el apoyo de grandes artistas que usan nuestros productos de manera profesional como Marilina Bertoldi, Baltasar Comotto, Pat Tomaselli, Lula Bertoldi, Brenda Martin, Manuel Quieto, Andrés Giménez, Gaspar Benegas, Lisardo Alverez, Hernán Rupolo, Ricardo Verdirame, Franchie Barreiro y Nico Bereciartua, entre otros.</p>        

@stop              
