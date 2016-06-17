@extends('app')

@section('customStyles')
@endsection
@section('content')
	<div class="col-sm-10 col-md-10 col-sm-offset-2 col-md-offset-1 centered-form">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="modal-title">Adicionar Novo Tipo de Leitura</h3>
			</div>
			<div class="panel-body">
				<form id="registerForm" method="POST" action="/admin/tipos-leituras/adicionar/submit" >
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">		
					<div class="form-group">
						<fieldset> 
							<legend>Dados do Novo Tipo</legend>
							<div class="col-xs-12 col-md-12">
								<label for="parâmetro">Nome do Parâmetro</label>
								<div class="input-group">
									<input type="text" class="form-control" id="nome"  name="parametro" placeholder="Insira o nome parâmetro" required><span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>		
								</div>
								<br>
								<label for="unidade">Unidade</label>
								<div class="input-group">
									<input type="text" class="form-control" id="numero"  name="unidade" placeholder="Insira o unidade do parâmetro" required=""><span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
								</div>
							</fieldset>
						</div>

						<div class="form-group">
							<div class="input-group-addon">
								<a href="{{ url()->previous() }}" role="button" name="cancelar"class="btn btn-default pull-right">Cancelar</a>
								<input type="submit" id="submit" value="Guardar" class="btn btn-success pull-right">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>


	@endsection
	@section('customScripts')
	@endsection

