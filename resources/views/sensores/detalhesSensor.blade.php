@extends('app')

@section('customStyles')
<link href="{{asset('css/exploracoes/addExploracao.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">

@endsection
@section('content')
<div class="col-sm-10 col-md-10 col-sm-offset-2 col-md-offset-1 centered-form">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="modal-title">Detalhes do Sensor</h3>
		</div>
		<div class="panel-body">
			<form id="registerForm" method="POST" action="/admin/sensores/adicionar/submit" >
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">		
				<div class="form-group">
					<h4 class="border-bottom sm-margin-left" >Dados do Sensor</h4>
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
			</div>				
			<div class="panel-footer"> 
				<div class="col-sm-12 input-group">
					<a href="/admin/sensores" role="button" name="cancelar"class="btnL btn btn-default pull-right" toggle="tooltip" data-placement="top" title="Cancelar">Voltar</a>
					<a class="btn btn-success pull-right" toggle="tooltip" data-placement="top" title="Editar Sensor"  role="button" name="editar" href="/admin/sensores/editar/{{$lista[0]->sensor_id}}">Editar</a>
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

