@extends('app')

@section('customStyles')
<link href="{{asset('css/registoManual/timePicker.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">


@endsection
@section('title', ' - Registo Manual')

@section('content')
<div class="col-sm-10 col-md-10 col-sm-offset-2 col-md-offset-1 centered-form">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="modal-title">Registo Manual</h3>
		</div>
		<div class="panel-body">
			<form id="registerForm" method="POST" action="/admin/registos/manual/submit">
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
				<div class="form-group">							
					<h4 class="border-bottom">Origem</h4>							
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
								<label for="associacao">Escolha uma Associação</label>
								<select id="ass_id" name="ass_id" class="selectpicker form-control" title="Selecione uma Associação"  data-live-search="true" showTick="true" required>
								</select>
							</div>
							<div class="col-xs-12 col-md-12" id="divListAssociacoes">
								
							</div>
						</div>
					</div>
					<div class="form-group">	
						<h4 class="border-bottom">Hora</h4>	
						<div class="col-xs-12 col-md-12">
							<div class="form-group">
								<label for="nome">Hora</label>		
								<input type="text" class="form-control" id="hora" name="data" />
							</div>
						</div>
					</div>
					<div class="form-group">	
						<h4 class="border-bottom">Valor</h4>
						<div class="col-xs-12 col-md-12">
							<div class="form-group">
								<div class="input-group">	
									<input type="number"  step="0.01" class="form-control" id="valor" value="{{ old('valor') }}" name="valor" placeholder="Insira um valor" required><span id="valor_span"class="input-group-addon"></span>
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
					<div class="form-group">
						<div class="input-group-addon">
							<a href="{{ url()->previous() }}" class="btnL btn btn-default pull-right">Cancelar</a>
							<input type="submit" id="submit" value="Guardar" class="btn btn-success pull-right">
						</div>
					</div>
				</form>						
			</div>
		</div>
	</div>


	@endsection
	@section('customScripts')	


	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script src="{{asset('js/registoManual/timePicker.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>

	<script src="{{asset('js/registoManual/adicionarRegistoManual.js')}}"></script>
	
	@endsection

