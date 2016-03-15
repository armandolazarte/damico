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
        <script src="/js/damico.js"></script>  
    </head>
    <body style="padding-top: 30px;">
    
        <div class="container">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <div class="navbar-brand">
                            <a href="{{ route('welcome') }}">DFX Admin</a>
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
                            <li><a href="{{ route('admin.quotas.index') }}">CUPOS NODRIZA</a></li>
                            <li><a href="{{ URL::to('/plataformas') }}">PEDIDOS NODRIZA</a></li>
                        </ul> 
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="{{ route('logout') }}">Salir</a></li>
                        </ul>                                              
                    </div>                    
                </div>
            </nav>

            <div id="content">
                @yield('content')
            </div>            
        </div>

    </body>
</html>
