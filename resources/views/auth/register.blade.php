<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Greenhouse Control</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/geral.css" rel="stylesheet">
    <link href="css/register.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="Absolute-Center is-Responsive">
            <div id="logo-container"></div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title" id="panelTitle">Great Greenhouse</h1>
                </div>
                <div class="panel-body">
                    <div class="col-sm-12 col-md-12 col-md-offset-1">
                        <form class="form-signin" method="POST" action="/register/registration">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div id="registerText">
                                <span class="form-signin-heading" >Insira os seus dados</span>
                                <hr>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input class="form-control" type="text" name='name' placeholder="nome" required/><span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
                                </div>
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
                            @if (count($errors) > 0 )
                                <br>
                                <div class="alert alert-danger">
                                    <h4>Por favor corrija os seguintes erros:</h4>
                                    <ul>
                                        @foreach ($errors->all() as $error)

                                            <li>{{ $error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group">
                                <a href="/" role="button" name="cancelar" class="btn btn-default pull-right">Cancelar</a>
                                <button type="submit" class="btn btn-success pull-right">Registar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="js/jquery-2.1.4.js"></script>
<script src="js/angular.js"></script>
<script src="js/bootstrap.js"></script>
</html>