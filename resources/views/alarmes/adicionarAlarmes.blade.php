@extends('app')

@section('customStyles')
<link href="{{asset('css/registoManual/timePicker.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">


@endsection
@section('title', ' - Adicionar Alarme')

@section('content')
<div class="container">
	<div class="row centered-form">
		<div class="col-xs-12 col-sm-9 col-md-8  col-sm-offset-3 col-md-offset-3">
			<div class="content">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="modal-title" id="myModalLabel" >Adicionar Alarme</h3>
					</div>
					<div class="panel-body">
						<form id="registerForm" method="POST" action="/admin/alarmes/adicionar/submit">
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
							<div class="form-group">							
								<h4 class="border-bottom">Origem</h4>							
								<div class="col-xs-12 col-md-12">		
									<div class="input-group margin-bottom">
										<label for="nome">Escolha uma Estufa</label>
										<div>
											<select id="ddEstufa" class="selectpicker form-control" title="Selecione uma Estufa"  data-live-search="true" showTick="true">
												@foreach($estufas as $key => $estufa)
												<option value="{{$estufa->id}}">{{$estufa->nome}}</option>
												@endforeach	
											</select>
										</div>
									</div>
									<div class="col-lg-3  margin-bottom">											
										<div class="btn-group" id="divAssociacoes">
											<label for="associacao">Escolha uma Associação</label>
											<select id="ass_id" name="ass_id" class="selectpicker form-control" title="Selecione uma Associação"  data-live-search="true" showTick="true" required>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">	
								<h4 class="border-bottom">Regra</h4>	
								<div class="col-xs-12 col-md-12">
									<div class="input-group margin-bottom">
										<label for="associacao">Escolha uma Regra</label>
										<select id="regra_id" name="regra_id" class="selectpicker form-control" title="Selecione uma Regra"  data-live-search="true" showTick="true" required>
											<option value="<="><=</option>
											<option value=">=">>=</option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">	
								<h4 class="border-bottom">Valor</h4>
								<div class="col-xs-12 col-md-12">
									<div class="form-group">
										<label for="valor">Valor</label>
										<div class="input-group">	
											<input type="number"  step="0.01" class="form-control" id="valor" value="{{ old('valor') }}" name="valor" placeholder="Insira um valor" min=0 required><span id="valor_span"class="input-group-addon" ></span>
										</div>
									</div>
								</div>	
							</div>
							<div class="form-group">	
								<h4 class="border-bottom">Descrição</h4>
								<div class="col-xs-12 col-md-12">
									<div class="form-group">
										<label for="valor">Descrição</label>
										<div class="input-group">	
											<input type="text"  step="0.01" class="form-control" id="descricao" value="{{ old('descricao') }}" name="descricao" placeholder="Insira uma descrição"><span class="input-group-addon" ></span>
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
									<a href="{{ url()->previous() }}" class="btn btn-default pull-right">Cancelar</a>
									<input type="submit" id="submit" value="Guardar" class="btn btn-success pull-right">
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
<script src="{{asset('js/alarmes/adicionarAlarmes.js')}}"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>


@endsection
