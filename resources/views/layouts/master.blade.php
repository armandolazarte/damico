<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>D'Amico FX - Equipamiento para músicos.</title>
        <meta property="og:title" content="D'Amico FX" />
        <meta property="og:description" content="Equipamiento para músicos." />
        <link rel="icon" type="image/png" href="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="." />
        <link media="all" type="text/css" rel="stylesheet" href="/css/lib.css" />
        <link media="all" type="text/css" rel="stylesheet" href="/css/damico.css" /> 
        <script src="/js/damico.js"></script>     
    </head>
    <body>

        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <a href="{{ route('home') }}" class="hidden-sm hidden-xs">
                        <img src="/img/logo.jpg" alt="D'Amico FX" class="img-responsive" />
                    </a>                 
                </div>
                <div class="col-lg-9 col-md-9">
                    <nav class="navbar navbar-inverse">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <div class="navbar-brand hidden-lg hidden-md">
                                    <img src="/img/logo2.png" alt="D'Amico FX" class="img-responsive" />
                                </div>                            
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>

                            <div class="collapse navbar-collapse" id="navbar">
                                <ul id="nav-main" class="nav navbar-nav">
                                    <li class="dropdown hidden-md hidden-lg">
                                        <a data-toggle="dropdown" class="dropdown-toggle" href="">
                                            @lang('PRODUCTOS') <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li class="{{ active('nodriza') }}"><a href="{{ route('nodriza') }}">NODRIZA</a></li>
                                            <li class="{{ active('plataformas') }}"><a href="{{ route('plataformas') }}">PLATAFORMAS</a></li>
                                        </ul>
                                    </li>
                                    <li class="{{ active('nodriza') }} hidden-xs hidden-sm"><a href="{{ route('nodriza') }}">NODRIZA</a></li>
                                    <li class="{{ active('plataformas') }} hidden-xs hidden-sm"><a href="{{ route('plataformas') }}">PLATAFORMAS</a></li>
                                    <li class="{{ active('artists') }}"><a href="{{ route('artists') }}">ARTISTAS</a></li>
                                </ul>
                                <ul id="social" class="nav navbar-nav navbar-right">
                                    <li><a href="https://www.facebook.com/damicoefectos" target="_blank"><i class="fa fa-facebook-square fa-2x"></i></a></li>
                                </ul>                        
                            </div>                    
                        </div>
                    </nav>
                </div>
            </div>

            <div id="content">
                @yield('content')
            </div>            

        </div>

        <footer class="mb20" style="margin-top: 50px;">
            <ul class="list-inline text-center">
                <li><small><span class="glyphicon glyphicon-copyright-mark"></span> D'Amico FX</small></li>
                <li><small><span class="fa fa-facebook-square"></span> /damicoefectos</small></li>
                <li><small><span class="glyphicon glyphicon-envelope"></span> damicofxs@hotmail.com</small></li>
            </ul>    
        </footer>
    </body>
</html>
