@extends('layouts.master')

@section('content')  
    <h2 class="mb20">Artistas</h2>
    <section id="artists">
        @foreach ($artists as $artist)
            <a href="img/{{ $artist->filename }}" data-toggle="lightbox" data-gallery="artists" data-title="{{ $artist->name }}">
                <img src="img/{{ $artist->filename }}" alt="" />
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