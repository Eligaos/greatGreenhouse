@extends('app')

@section('customStyles')
<link href="{{asset('css/exploracoes/addExploracao.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">

@endsection
@section('content')
<div class="container">
	<div class="row centered-form">
		<div class="col-xs-12 col-sm-9 col-md-8  col-sm-offset-3 col-md-offset-2">
			<div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="modal-title">Adicionar Novo Sensor</h3>
					</div>
					<div class="panel-body">
						<form id="registerForm" method="POST" action="/admin/sensores/adicionar/submit" >
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">		
							<div class="form-group">
								<fieldset> 
									<legend>Dados do Novo Sensor</legend>
									<div class="col-xs-12 col-md-12">
										<label for="nome">Nome do Sensor</label>
										<div class="input-group">
											<input type="text" class="form-control" id="nome"  name="nome" placeholder="Insira o nome do sensor" required><span class="input-group-addon"></span>		
										</div>
										<label for="modelo">Modelo</label>
										<div class="input-group">
											<input type="text" class="form-control" id="modelo"  name="modelo" placeholder="Insira o modelo do sensor" required=""><span class="input-group-addon"></span>
										</div>
										<label for="area_alcance">Alcance</label>
										<div class="input-group">
											<input type="number" class="form-control" id="area_alcance"  name="area_alcance" placeholder="Insira o alcance do sensor" required="" min=0><span class="input-group-addon"></span>
										</div>
									</div>
									<label>Escolha o Tipo</label>
									<div class="col-xs-12 col-md-12">
										<select id="tipo_id" name="tipo_id" class="selectpicker form-control" title="Selecione um Tipo"  data-live-search="true" showTick="true" required>
											@foreach($tiposLeituras as $key => $tipo)
											<option value="{{$tipo->id}}">{{$tipo->parametro}}</option>
											@endforeach	
										</select>
									</div>
								</fieldset>
							</div>
							@if (count($errors) > 0 )
							<div class="alert alert-danger col-lg-3">
								<h4>Por favor corrija os seguintes erros:</h4>
								<ul>
									@foreach ($errors->all() as $error)
									<li>{{ $error}}</li>
									@endforeach
								</ul>
							</div>
							@endif
							<div class="form-group">
								<div class="input-group-addon">
									<a href="/admin/sensores/listar" role="button" name="cancelar"class="btn btn-default pull-right">Cancelar</a>
									<input type="submit" id="submit" value="Gravar" class="btn btn-success pull-right">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
@endsection

