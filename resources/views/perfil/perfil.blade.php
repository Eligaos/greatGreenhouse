@extends('app')

@section('customStyles')

@endsection
@section('content')
<div class="col-sm-10 col-md-10 col-sm-offset-2 col-md-offset-1 centered-form">
	<div class="panel panel-default">
		<div class="panel-heading">
		<h3 class="modal-title">Dados do Perfil</h3>
		</div>
		<div class="panel-body">
			<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

			<fieldset>
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

				<div class="form-group">
					<div class="input-group-addon">
						<a href="/admin/perfil/editar" role="button" name="editar" class="btn btn-success pull-right">Editar</a></div>
					</div>

				</div>
			</div>
		</div>

		@endsection


		@section('customScripts')

		@endsection
