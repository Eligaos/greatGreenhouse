@extends('app')

@section('customStyles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">

@endsection
@section('title', ' - Detalhes dos Alarmes')
@section('content')
<div class="col-sm-10 col-md-10 col-sm-offset-2 col-md-offset-1 centered-form">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="modal-title">Detalhes do Alarme</h3>
		</div>
		<div class="panel-body">
			<div class="form-group">
				<h4 class="border-bottom sm-margin-left">Dados do Alarme</h4>
				<div class="col-xs-12 col-md-12">
					<p>
						<label for="nome">Nome da Estufa:</label>
						<span>{{$alarme->nome}}</span>	
					</p>
					
					@if($alarme->regra == ">")
					<p>		
						<label for="regra">Regra</label>
						<span>Valores Superiores a {{$alarme->valor}} {{$alarme->unidade}}</span>
					</p>
					@else
					<p>		
						<label for="regra">Regra:</label>
						<span>Valores Inferiores a {{$alarme->valor}} {{$alarme->unidade}}</span>
					</p>
					@endif
					<p>
						<label for="parametro">Parametro:</label>
						<span>{{$alarme->parametro}}</span>	
					</p>
					<p>
						<label>Descrição:</label>
						<span>{{$alarme->descricao}}</span>
					</p>
				</div>									
			</div>							
			<div class="form-group">
				<div class="input-group-addon">
					<a href="/admin/alarmes" role="button" name="cancelar"class="btn btn-default pull-right" toggle="tooltip" data-placement="top" title="Cancelar">Voltar</a>
					<a class="btn btn-success pull-right" toggle="tooltip" data-placement="top" title="Editar Alarme"  role="button" name="editar" href="#">Editar</a>
				</div>
			</div>
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

