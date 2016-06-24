@extends('app')

@section('customStyles')

@endsection
@section('content')
<div class="col-sm-10 col-md-10 col-sm-offset-2 col-md-offset-1 centered-form">
	<div class="panel panel-default">
		<div class="panel-heading margin-bottom">
			<h3 class="modal-title">Dados do Perfil</h3>
		</div>
		<div class="panel-body">
			<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

			<fieldset>
				<div class="col-xs-12 col-md-12">
					<p>
					<label >Nome:</label>
					<span>{{Auth::getUser()->name}}</span>
					</p>
					<p>
					<label>E-mail: </label>
					<span>{{Auth::getUser()->email}}</span>
					</p>
					<p>
					<label>Nº Telemóvel: </label>
					<span>{{Auth::getUser()->cellphone}}</span>
					</p>
				</fieldset>
			</div>
			<div class="panel-footer"> 
				<div class="col-sm-12 input-group">
					<a href="/admin/perfil/editar" role="button" name="editar" class="btn btn-success pull-right">Editar</a></div>
				</div>

			</div>
		</div>
	</div>

	@endsection


	@section('customScripts')

	@endsection
