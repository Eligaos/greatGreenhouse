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
						<h3 class="modal-title">Detalhes do Sensor</h3>
					</div>
					<div class="panel-body">
						<form id="registerForm" method="POST" action="/admin/sensores/adicionar/submit" >
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">		
							<div class="form-group">
								<h4 class="border-bottom">Dados do Sensor</h4>
								<div class="col-xs-12 col-md-12">
									<p>
										<label for="nome">Nome do Sensor:</label>
										<span>{{$lista[0]->nome}}</span>	
									</p>
									<p>										
										<label for="modelo">Modelo:</label>
										<span>{{$lista[0]->modelo}}</span>											
									</p>
									<p>
										<label for="area_alcance">Alcance:</label>
										<span>{{$lista[0]->area_alcance}}</span>	
									</p>
									<p>
										<label>Escolha o Tipo:</label>
										<span>{{$lista[0]->parametro}}</span>	
									</p>
								</div>									
							</div>							
							<div class="form-group">
								<div class="input-group-addon">
									<a href="/admin/sensores/listar" role="button" name="cancelar"class="btn btn-default pull-right" toggle="tooltip" data-placement="top" title="Cancelar">Voltar</a>
									<a class="btn btn-success pull-right" toggle="tooltip" data-placement="top" title="Editar Sensor"  role="button" name="editar" href="/admin/sensores/editar/{{$lista[0]->sensor_id}}">Editar</a>
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

