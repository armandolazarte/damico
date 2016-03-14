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
    </head>
    <body style="padding-top: 50px;">

        <div class="container">

            <div class="panel panel-default">
                <div class="panel-heading">Acceso Administrador</div>
                <div class="panel-body">

                    @include('admin.errors')
                    @include('admin.success')                                 

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Usuario</label>
                            <div class="col-md-6">
                                <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}" autofocus />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>
                            <div class="col-md-6">
                                <input type="password" id="password" class="form-control" name="password" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" /> Recordarme en esta máquina
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Ingresar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    
    </body>
</html>