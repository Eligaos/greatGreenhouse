@extends('app')

@section('customStyles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">

@endsection
@section('title', ' - Adicionar Sensor')

@section('content')>
<div class="col-sm-10 col-md-10 col-sm-offset-2 col-md-offset-1 centered-form">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="modal-title" id="myModalLabel">Adicionar Novo Sensor</h3>
			</div>
			<div class="panel-body">
				<form id="registerForm" method="POST" action="/admin/sensores/adicionar/submit" >
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">		
					<div class="form-group">
						<h4 class="border-bottom">Dados do Novo Sensor</h4>
						<div class="col-xs-12 col-md-12">
							<label for="nome">Nome do Sensor</label>
							<div class="input-group margin-bottom">
								<input type="text" class="form-control" id="nome"  name="nome" placeholder="Insira o nome do sensor" required><span class="input-group-addon"></span>		
							</div>
							<label for="modelo">Modelo</label>
							<div class="input-group margin-bottom">
								<input type="text" class="form-control" id="modelo"  name="modelo" placeholder="Insira o modelo do sensor" required=""><span class="input-group-addon"></span>
							</div>
							<label for="area_alcance">Alcance</label>
							<div class="input-group margin-bottom">
								<input type="number" class="form-control" id="area_alcance"  name="area_alcance" placeholder="Insira o alcance do sensor" required="" min=0><span class="input-group-addon"></span>
							</div>
						</div>
						<div class="col-xs-12 col-md-12 margin-bottom">
							<label>Escolha o Tipo</label>
							<select id="tipo_id" name="tipo_id" class="selectpicker form-control" title="Selecione um Tipo"  data-live-search="true" showTick="true" required>
								@foreach($tiposLeituras as $key => $tipo)
								<option value="{{$tipo->id}}">{{$tipo->parametro}}</option>
								@endforeach	
							</select>
						</div>
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
							<a href="{{ url()->previous() }}" role="button" name="cancelar"class="btn btn-default pull-right">Cancelar</a>
							<input type="submit" id="submit" value="Gravar" class="btn btn-success pull-right">
						</div>
					</div>
				</form>
			</div>
		</div>
</div>
@endsection
@section('customScripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
@endsection

