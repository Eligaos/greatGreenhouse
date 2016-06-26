@extends('app')

@section('customStyles')

@endsection
@section('content')
<div class="col-sm-10 col-md-10 col-sm-offset-2 col-md-offset-1 centered-form">
    <div class="panel panel-default">
        <div class="panel-heading margin-bottom">
            <h3 class="modal-title" >Editar Perfil</h3>
        </div>
        <div class="panel-body">
            @if (count($errors) > 0 )
            <div class="col-xs-12 col-md-12 alert alert-danger">
                <h4>Por favor corrija os seguintes erros:</h4>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="col-xs-12 col-md-12">
                <form id="registerForm" method="POST" >

                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="form-group">
                        <fieldset>

                            <label for="nome">Nome</label>
                            <div>
                                <input type="text" class="form-control" id="name" name="name" value="{{Auth::getUser()->name}}">
                            </div><br>
                            <label for="email">Email</label>
                            <div>
                                <input type="text" class="form-control" id="email" name="email" value="{{Auth::getUser()->email}}">
                            </div><br>
                            <label for="cellphone">Telemóvel</label>
                            <div>
                                <input type="number" class="form-control" id="cellphone" name="cellphone" placeholder="Insira um nº de telemóvel" value="{{ isset(Auth::getUser()->cellphone) ? Auth::getUser()->cellphone : old('cellphone')}}">

                            </div><br>
                            <label for="email">Password</label>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input class="form-control" type="password" name='password' placeholder="palavra-passe" required/><span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
                            </div>
                            <label for="email">Confirmar Password</label>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input class="form-control" type="password" name='password_confirmation' placeholder="confirmação da palavra-passe" required/>
                                <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
                            </div>
                        </fieldset>
                    </div>

                </div>
            </div>
            <div class="panel-footer"> 
                <div class="col-sm-12 input-group">
                    <a href="{{url()->previous()}}" role="button" name="cancelar"class="btnL btn btn-default pull-right">Cancelar</a>
                    <input type="submit" name="gravar" id="gravar" value="Gravar" class="btn btn-success pull-right">
                </div>
            </div>
        </form>


    </div>

    @endsection


    @section('customScripts')

    @endsection
