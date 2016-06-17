@extends('app')

@section('customStyles')
<link href="{{asset('css/associacoesTiposLeitura/adicionarAssociacao.css')}}" rel="stylesheet">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">

@endsection
@section('title', ' - Nova Associação')

@section('content')
<div class="col-sm-10 col-md-10 col-sm-offset-2 col-md-offset-1 centered-form">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="modal-title" id="myModalLabel">Adicionar Nova Associação</h3>
		</div>
		<div class="panel-body">
			<form id="registerForm" method="POST" action="/admin/associacoes/associar/submit">
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">			
				@if( Session::get('message'))
				<div class="text-center">
					<span class="alert alert-info"> {{ Session::get('message') }}</span>
				</div>
				@endif
				<h4 class="border-bottom">Sensor</h4>
				<div class="col-xs-12 col-md-12 margin-bottom">
					<div class="btn-group">
						<label>Escolha um Sensor</label>
						<div>
							<select id="sensor_id" name="sensor_id" class="selectpicker form-control" title="Selecione um Sensor" data-live-search="true" required>
								@foreach($sensores as $key => $sensor)
								<option value="{{$sensor->sensor_id}}">{{$sensor->nome}} - {{$sensor->parametro}}</option>
								@endforeach									
							</select>
						</div>
					</div>
				</div>

				<h4 class="border-bottom">Localização</h4>
				<div class="form-group">
					<div class="col-xs-12 col-md-12 margin-bottom">
						<div class="row">
							<div class="col-lg-3">	
								<div class="btn-group">
									<label>Escolha uma Estufa</label>
									<div>
										<select id="ddEstufa" name="ddEstufa" class="selectpicker form-control" title="Selecione uma Estufa"  data-live-search="true" showTick="true" required>
											@foreach($estufas as $key => $estufa)
											<option value="{{$estufa->id}}">{{$estufa->nome}}</option>
											@endforeach	
										</select>
									</div>
								</div>
							</div>	

							<div class="col-lg-3">											
								<div class="btn-group" id="divAssociacoesSetores">
									<label>Escolha um Setor</label>
									<select id="setor_id" name="setor_id" class="selectpicker form-control" title="Selecione um Setor"  data-live-search="true" showTick="true" required>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>

					<div class="form-group">
						<div class="input-group-addon">
							<a href="{{ url()->previous() }}" role="button" class="btn btn-default pull-right">Cancelar</a>
							<input type="submit" id="submit" value="Gravar" class="btn btn-success pull-right">
						</div>
					</div>
			
			</form>
		</div>
	</div>
</div>

@endsection
@section('customScripts')
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>

<script src="{{asset('js/associacoes/adicionarAssociacao.js')}}"></script>
@endsection
