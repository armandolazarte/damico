@extends('layouts.master')

@section('content') 
    <div class="main-content-container">   
        <h2>Preguntas frecuentes</h2>
        <dl>
            <dt>Hacen envíos?</dt>
            <dd>Sí, hacemos envíos (costo a cargo del comprador) por Correo Argentino, OCA o Vía Cargo.</dd>
            <dt>Cuáles son los medios de pago?</dt>
            <dd>Depósito o transferencia bancarios y Mercado Pago (7% de recargo además de los intereses).</dd>
            <dt>Cuánto sale la Nodriza y qué especificaciones tiene?</dt>
            <dd><a href="{{ URL::to('/nodriza') }}">Ver aquí</a></dd>
            <dt>Cuánto salen las Plataformas y cuáles son sus medidas?</dt>
            <dd><a href="{{ URL::to('/plataformas') }}">Ver aquí</a></dd>
        </dl>
        <div class="alert alert-warning">
            <h3>Importante!</h3>
            <ul>
                <li>Si hiciste una consulta un sábado, domingo o feriado y no recibiste respuesta, no desesperes: en alguno de los cinco días hábiles siguientes te va a llegar.</li>
                <li>Las medidas de las Plataformas son de fábrica. No hacemos tamaños a pedido ni las personalizamos con nombres.</li>
                <li>Las Plataformas no traen la Nodriza incluída. Son dos productos diferentes que se pueden combinar en una misma compra.</li>
            </ul>
        </div>
    </div>
@stop