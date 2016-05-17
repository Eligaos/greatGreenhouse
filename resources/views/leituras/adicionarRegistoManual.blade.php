@extends('app')

@section('customStyles')
<link href="{{asset('css/exploracoes/addExploracao.css')}}" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">


@endsection
@section('title', ' - Adicionar Cultura')

@section('content')
<div class="container">
	<div class="row centered-form">
		<div class="col-xs-12 col-sm-9 col-md-8  col-sm-offset-3 col-md-offset-3">
			<div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title" id="myModalLabel">Detalhes Cultura</h3>
					</div>
					<div class="panel-body">
						<form id="registerForm" method="POST" action="/admin/culturas/adicionar/submit">
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">							
							<fieldset> 
								<legend>Localização</legend>
								<div class="col-xs-12 col-md-12">
									<div class="row">
										<div class="col-lg-3">	
											<div class="btn-group">
												<label>Escolha uma Estufa</label>
												<div>
													<select id="ddEstufa" name="ddEstufa" class="selectpicker form-control" title="Selecione uma Estufa"  data-live-search="true" showTick="true">
														@foreach($estufas as $key => $estufa)
														<option value="{{$estufa->id}}">{{$estufa->nome}}</option>
														@endforeach	
													</select>
												</div>
											</div>
											<div class="col-lg-3">											
												<div class="btn-group" id="divAssociacoes">
													<label>Escolha um Tipo </label>
													<select id="tipo_id" name="tipo_id" class="selectpicker form-control" title="Selecione um Tipo"  data-live-search="true" showTick="true" required>
													</select>
												</div>
											</div>											
										</div>
									</div>	
								</fieldset>	
								
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
										<a href="/admin/culturas/listar" role="button" name="cancelar"class="btn btn-default pull-right">Cancelar</a>
										<input type="submit" id="submit" class="btn btn-success pull-right">
									</div>
								</div>
							</form>						
						</div>
					</div>
				</div>
			</div>
		</div>
		@endsection
		@section('customScripts')	
		<script src="{{asset('js/adicionarRegistoManual/adicionarRegistoManual.js')}}"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>

		@endsection

