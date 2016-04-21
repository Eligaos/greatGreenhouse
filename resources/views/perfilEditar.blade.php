@extends('app')

@section('customStyles')
    <link href="{{asset('css/addExploracao.css')}}" rel="stylesheet">

@endsection
@section('content')
    <div class="container">
        <div class="row centered-form">
            <div class="col-xs-12 col-sm-9 col-md-8  col-sm-offset-3 col-md-offset-3">
                <div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title" id="myModalLabel">Dados do Perfil</h3>
                        </div>
                        <div class="panel-body">

                            <form id="registerForm" method="POST" >

                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <div class="form-group">
                                    <fieldset>
                                        <legend>Editar Dados</legend>
                                        <label for="nome">Nome</label>
                                        <div>
                                            <input type="text" class="form-control" id="nome" name="nome" value="{{Auth::getUser()->name}}">
                                        </div><br>
                                        <label for="email">Email</label>
                                        <div>
                                            <input type="text" class="form-control" id="email" name="email" value="{{Auth::getUser()->email}}">
                                        </div><br>
                                        <label for="cellphone">Telemóvel</label>
                                        <div>
                                            <input type="text" class="form-control" id="cellphone" name="cellphone" value="{{Auth::getUser()->cellphone}}" >
                                        </div><br>
                                        <label for="email">Password</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                            <input class="form-control" type="password" name='password' placeholder="password" required/><span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
                                        </div>
                                        <label for="email">Confirmar Password</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                            <input class="form-control" type="password" name='password_confirmation' placeholder="password confirmation" required/>
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
                                        </div>
                                    </fieldset>
                                </div>

                                <div class="form-group">
                                    <div class="input-group-addon">
                                        <a href="/admin/perfil" role="button" name="cancelar"class="btn btn-default pull-right">Cancelar</a>
                                        <input type="submit" name="gravar" id="gravar" value="Gravar" class="btn btn-success pull-right">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('customScripts')

@endsection
