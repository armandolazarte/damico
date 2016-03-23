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
        <link href='https://fonts.googleapis.com/css?family=Fredoka+One' rel='stylesheet' type='text/css'>
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
                <div class="col-lg-3">
                    <a href="{{ URL::to('/') }}">
                        <img src="/img/logo.jpg" alt="D'Amico FX" class="img-responsive hidden-xs hidden-sm hidden-md" />
                    </a>
                </div>
                <div class="col-lg-9">
                    <nav class="navbar navbar-inverse">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <div class="navbar-brand hidden-lg">
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
                                    <li class="{{ active('nodriza') }}"><a href="{{ route('nodriza') }}">NODRIZA</a></li>
                                    <li class="{{ active('plataformas') }}"><a href="{{ route('plataformas') }}">PLATAFORMAS</a></li>
                                    <li><a href="">ARTISTAS</a></li>
                                    <li class="{{ active('faq') }}"><a href="{{ route('faq') }}">PREGUNTAS FRECUENTES</a></li>
                                </ul>
                                <ul id="social" class="nav navbar-nav navbar-right">
                                    <li><a href="https://www.facebook.com/damicoefectos" target="_blank"><i class="fa fa-facebook-square fa-2x"></i></a></li>
                                </ul>                        
                            </div>                    
                        </div>
                    </nav>
                    <div class="text-right">
                        <span class="glyphicon glyphicon-envelope" style="margin-right: 6px;"></span>damicofxs@hotmail.com 
                    </div>
                </div>
            </div>

            <div id="content">
                @yield('content')
            </div>

        </div>
    </body>
</html>
