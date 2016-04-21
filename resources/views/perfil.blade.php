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
						<h3 class="panel-title" id="myModalLabel">Perfil</h3>
					</div>
					<div class="panel-body">

						<form id="registerForm" method="POST" >

						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">							
							<div class="form-group">
								<fieldset> 
									<legend>Dados da Estufa</legend>
									<div class="col-xs-12 col-md-12">

										<label for="nome">Nome:</label>
                                            <span>{{Auth::getUser()->name}}</span>
										<br>
                                        <label for="nome">E-mail: </label>
                                        <span>{{Auth::getUser()->email}}</span>
                                        <br>
										<label for="nome">Nº Telemóvel: </label>
                                        <span>{{Auth::getUser()->cellphone}}</span>
									</fieldset>
								</div>

								<div class="form-group">
									<div class="input-group-addon">
										<a href="/admin/perfil/editar" role="button" name="editar" class="btn btn-success pull-right">Editar</a></div>
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
