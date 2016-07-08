@extends('app')

@section('customStyles')
<link href="{{asset('css/registoManual/timePicker.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">


@endsection
@section('title', ' - Editar Alarme')

@section('content')
<div class="col-sm-10 col-md-10 col-sm-offset-2 col-md-offset-1 centered-form">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="modal-title">Editar Alarme</h3>
		</div>
		<div class="panel-body">
			<form id="registerForm" method="POST" action="/admin/alarmes/editar/submit/{{$estufaID}},{{$alarmeValor}},{{$alarmeParametro}},{{$alarmeDescricao}},{{$alarmeRegra}}">
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
				<div class="form-group">							
					<h4 class="border-bottom sm-margin-left">Origem</h4>							
					<div class="margin-bottom">
						<div class="btn-group col-xs-12 col-md-12 margin-bottom">
							<label for="nome">Escolha uma Estufa</label>
							<div>
								<select id="ddEstufa" name="ddEstufa" class="selectpicker form-control" title="Selecione uma Estufa"  data-live-search="true" showTick="true">
									@foreach($estufas as $key => $estufa)
									<option value="{{$estufa->id}}">{{$estufa->nome}}</option>
									@endforeach	
								</select>
							</div>
						</div>
						<div class="margin-bottom">											
							<div class="btn-group col-xs-12 col-md-12 margin-bottom" id="divAssociacoes">
								<label for="associacao">Escolha um Parâmetro </label>
								<select id="ass_id" name="ass_id" class="selectpicker form-control" title="Selecione um Parâmetro"  data-live-search="true" showTick="true" required>
								</select>
							</div>
							<div class="col-xs-12 col-md-12" id="divListAssociacoes">
								
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">	
					<h4 class="border-bottom sm-margin-left">Regra</h4>	
					<div class="col-xs-12 col-md-12">
						<div class="margin-bottom">
							<label for="associacao">Escolha uma Regra</label>
							<select id="regra_id" name="regra" class="selectpicker form-control" title="Selecione uma Regra"  data-live-search="true" showTick="true" required><span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
								<option value="<"><</option>
								<option value=">">></option>
							</select>
						</div>
					</div>
				</div>
				<div class="form-group">	
					<h4 class="border-bottom sm-margin-left">Valor</h4>
					<div class="col-xs-12 col-md-12">
						<div class="form-group">
							<label for="valor">Valor</label>
							<div class="input-group">	
								<input type="number"  step="0.01" class="form-control" id="valor" value="{{ $alarmeValor }}" name="valor" placeholder="Insira um valor" required><span id="valor_span"class="input-group-addon" ></span>
							</div>
						</div>
					</div>	
				</div>
				<div class="form-group">	
					<h4 class="border-bottom sm-margin-left">Descrição</h4>
					<div class="col-xs-12 col-md-12">
						<div class="form-group">
							<label for="valor">Descrição</label>
							<div class="input-group">	

								@if(old('descricao')!=null)
								<input type="text"  step="0.01" class="form-control" id="descricao" value="{{ old('descricao') }}" name="descricao" placeholder="Insira uma descrição"><span class="input-group-addon" ></span>
								@else
								<input type="text"  step="0.01" class="form-control" id="descricao" value="{{ $alarmeDescricao }}" name="descricao" placeholder="Insira uma descrição"><span class="input-group-addon" ></span>
								@endif

							</div>
						</div>
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
			</div>
			<div class="panel-footer"> 
				<div class="col-sm-12 input-group">
					<a href="{{ url()->previous() }}" class="btnL btn btn-default pull-right">Cancelar</a>
					<input type="submit" id="submit" value="Guardar" class="btn btn-success pull-right">
				</div>
			</div>
		</form>						
		
	</div>
</div>

@endsection
@section('customScripts')	
<script>		
	var alarme = <?php echo json_encode($alarmeValor)?>;;
</script>

<script src="{{asset('js/alarmes/editarAlarmes.js')}}"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>


@endsection

