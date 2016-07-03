<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Great Greenhouse - Register</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap/bootstrap.css')}}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{asset('css/home/geral.css')}}" rel="stylesheet">
    <link href="{{asset('css/home/register.css')}}" rel="stylesheet">
</head>
<body>
    <div class="auth-content">
            <div class="col-sm-12 col-md-4 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title" id="panelTitle">Great Greenhouse</h1>
                    </div>
                    <div class="panel-body">
                        <div class="col-sm-12 col-md-12 col-md-offset-1">
                            @if (count($errors) > 0 )

                            <div class="alert alert-danger">
                                <h4>Por favor corrija os seguintes erros:</h4>
                                <ul>
                                    @foreach ($errors->all() as $error)

                                    <li>{{ $error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <form class="form-signin" method="POST" action="/register/registration">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div id="registerText" class="margin-bottom md-margin-top border-bottom">
                                    <span class="text-center">Por favor preencha os seguintes dados:</span>
                                    <hr
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input class="form-control" type="text" name='name' placeholder="nome" required/><span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
                                </div>

                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <input class="form-control" type="email" name='email' placeholder="email" required/><span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                    <input class="form-control" type="text" name='cellphone' placeholder="telemóvel"/>
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input class="form-control" type="password" name='password' placeholder="palavra-passe" required/><span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
                                </div>

                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input class="form-control" type="password" name='password_confirmation' placeholder="confirmação da palavra-passe" required/><span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
                                </div>

                            </div>

                        </div>

                    </form>
                </div>
                <div class="panel-footer"> 
                    <div class="col-sm-12 input-group">
                        <a href="{{ url()->previous() }}" role="button" name="cancelar" class="btn btn-default pull-right">Cancelar</a>
                        <button type="submit" class="btn btn-success pull-right">Registar</button>
                    </div>
                </div>
            </div>

    </div>
</body>
<script src="{{asset('js/jquery/jquery-2.1.4.js')}}"></script>
<script src="{{asset('js/angular/angular.js')}}"></script>
<script src="{{asset('js/bootstrap/bootstrap.js')}}"></script>
</html>