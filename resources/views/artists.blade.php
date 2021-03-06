@extends('layouts.master')

@section('content')  
    <h1>Artistas que usan nuestros productos</h1>
    <section id="artists">
        @foreach ($artists as $artist)
            <a href="img/{{ $artist->filename }}" data-toggle="lightbox" data-gallery="artists" data-title="{{ $artist->name }}<br /><small>{{ implode(' / ', $artist->projects) }}<small>">
                <img src="img/{{ $artist->filename }}" alt="{{ $artist->name }}" />
            </a>
        @endforeach
    </section>

    <script type="text/javascript">
        $(document).on('click', '*[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
    </script>    
@stop