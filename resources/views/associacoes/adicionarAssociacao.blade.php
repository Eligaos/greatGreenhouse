@extends('app')

@section('customStyles')
<link href="{{asset('css/associacoesTiposLeitura/adicionarAssociacao.css')}}" rel="stylesheet">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">

@endsection
@section('title', ' - Nova Associação')

@section('content')
<div class="container">
	<div class="row centered-form">
		<div class="col-xs-12 col-sm-9 col-md-10 col-sm-offset-3 col-md-offset-2">
			<div>
				<div class="panel panel-default">
					<div class="panel-body">
						<form id="registerForm" method="POST" action="/admin/associacoes/associar/submit">
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">						
							<div class="form-group">
								<h3>Dados da Estufa</h3><hr>
							</div>			
								@if( Session::get('message'))
										<div style="text-align: center">
											<span class="alert alert-info"> {{ Session::get('message') }}</span>
										</div>
										@endif
							<div class="col-lg-3">	
								<div class="btn-group">
									<label>Escolha uma Estufa</label>
									<div>
										<select id="dropdownEstufas" class="selectpicker form-control" title="Selecione uma Estufa" data-live-search="true">
											@foreach($estufas as $key => $estufa)
											<option value="{{$estufa->id}}">{{$estufa->nome}}</option>
											@endforeach									
										</select>
									</div>
								</div>
								<!--<div class="btn-group" id="divdropdownSetores">
									<label>Escolha um Setor</label>
									<select title="Selecione um Setor" class="selectpicker form-control" id="dropdownSetores" data-live-search="true">
									</select>
								</div>-->
							</div>
							<div class="col-lg-6" id="divdropdowntiposLeiturasEstufas">	
								<div class="btn-group" >
									<div class="btn-group" >
										<label>Tipos Leitura a Associar a Estufa</label>
										<select class="selectpicker" id="dropdowntiposLeiturasEstufas" data-live-search="true" title="Selecione os tipos pretendidos" data-selected-text-format="count" multiple>
											@foreach($tiposLeituras as $key => $tipoLeitura)
											<option value="{{$tipoLeitura->id}}">{{$tipoLeitura->parametro}} - Unidade: {{$tipoLeitura->unidade}}</option>
											@endforeach
										</select>
									</div>
									<!--<div class="btn-group" id="divAssociacoesSetores">
										<label>Tipos Leitura a Associar ao Setor</label>
										<select class="selectpicker" id="dropdowntiposLeiturasSetores" data-live-search="true" title="Selecione" multiple>
											@foreach($tiposLeituras as $key => $tipoLeitura)
											<option value="{{$tipoLeitura->id}}">{{$tipoLeitura->parametro}} - Unidade: {{$tipoLeitura->unidade}}</option>
											@endforeach
										</select>
									</div>-->
								</div>	
	
							</div>	

							<div id="containerAssociacoes" class="table-container form-group">

							</div>

							<div class="col-lg-12">
								<div class="form-group">
									<div class="input-group-addon">
										<a href="/admin/estufas/listar" role="button" class="btn btn-default pull-right">Cancelar</a>
										<input type="submit" id="submit" value="Gravar" class="btn btn-success pull-right">
									</div>
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
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>

<script src="{{asset('js/associacoesTiposLeitura/adicionarAssociacao.js')}}"></script>
@endsection
