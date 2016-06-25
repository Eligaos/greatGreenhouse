@extends('app')

@section('customStyles')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">


@endsection
@section('title', ' - Adicionar Cultura')

@section('content')
<div class="col-sm-10 col-md-10 col-sm-offset-2 col-md-offset-1 centered-form">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="modal-title">Adicionar Cultura</h3>
		</div>
		<div class="panel-body">
			@if (count($errors) > 0 )
			<div class="col-xs-12 col-md-12 alert alert-danger">
				<h4>Por favor corrija os seguintes erros:</h4>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error}}</li>
					@endforeach
				</ul>
			</div>
			@endif
			<form id="registerForm" method="POST" action="/admin/culturas/adicionar/submit">
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">							
				<div class="form-group">
					<h4 class="border-bottom sm-margin-left">Dados da Cultura</h4>					
					<div class="col-xs-12 col-md-12 margin-bottom">
						<label for="nome">Nome da Cultura</label>
						<div class="input-group margin-bottom">				
							<input type="text" class="form-control" id="nome"  name="nome" value="{{ old('nome') }}" placeholder="Insira o nome da Cultura" required><span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
						</div>									
						<div class="row">
							<div class="col-md-6 margin-bottom">										
								<label for="nome">Tipo Cultura</label>
								<div>
									<select id="tipo_cultura" name="tipo_cultura" class="selectpicker form-control" title="Selecione um Tipo de Cultura" value="{{ old('tipo_cultura') }}" selected="{{ old('tipo_cultura') }}" data-live-search="true" showTick="true">
										<option value="temporaria">Temporária</option>
										<option value="permanente">Permanente</option>
									</select>
								</div>
							</div>
							<div class="col-md-6 pull-left">		
								<label for="nome">Tipo Cultivo</label>
								<div>
									<select id="tipo_cultivo" name="tipo_cultivo" class="selectpicker form-control" title="Selecione um Tipo de Cultivo" value="{{ old('tipo_cultivo') }}" selected="{{ old('tipo_cultivo') }}"  data-live-search="true" showTick="true">
										<option value="tradicional">Tradicional</option>
										<option value="hidroponia">Hidroponia</option>
										<option value="aeroponia">Aeroponia</option>
										<option value="outro">Outro</option>
									</select>														
								</div>
							</div>
							<div class="col-md-12" id="dOutro" name="dOutro"  style="display: none"> 
								<label for="nome">Outro</label>
								<div class="input-group">
									<input type="input" class="form-control" id="inpOutro"  value="{{ old('inpOutro') }}" name="inpOutro" placeholder="Insira outro tipo de Cultivo"><span class="input-group-addon"></span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">	
					<h4 class="border-bottom sm-margin-left">Duração</h4>					
					<div class="col-xs-12 col-md-12 margin-bottom">
						<div class="form-group">
							<div class="row">
								<div class="col-lg-6">	
									<label for="nome">Data Inicial do Ciclo</label>
									<div class="input-group">									
										<input type="text" class="form-control" id="dInic" value="{{ old('data_inicio_ciclo') }}" name="data_inicio_ciclo"><span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
									</div>	
								</div>	
								<div class="col-lg-6">											
									<label for="nome">Data de Fim do Ciclo</label>
									<div class="input-group">									
										<input type="text" class="form-control" id="dFim" value="{{ old('data_prevista_fim_ciclo') }}" name="data_prevista_fim_ciclo"><span class="input-group-addon" id="error"></span>
									</div>
								</div>
							</div>
						</div>
						<label for="nome">Duração do Ciclo</label>
						<div class="input-group">											
							<input type="number" class="form-control" id="duracao_ciclo"  value="{{ old('duracao_ciclo') }}" name="duracao_ciclo" placeholder="Insira a duração do ciclo" min=0 ><span class="input-group-addon">dias</span>
						</div>
					</div>	
				</div>	
				<div class="form-group">	
					<h4 class="border-bottom sm-margin-left">Dimensões</h4>
					<div class="col-xs-12 col-md-12">
						<div class="form-group">
							<div class="row margin-bottom">
								<div class="col-lg-6">	
									<label for="nome">Espaço na Linha</label>
									<div class="input-group">									
										<input type="number" class="form-control" id="espaco_na_linha" value="{{ old('espaco_na_linha') }}" name="espaco_na_linha" placeholder="Insira o espaçamento na Linha" min=0><span class="input-group-addon">metros</span>
									</div>
								</div>
								<div class="col-lg-6">											
									<label for="nome">Espaço entre Linhas</label>
									<div class="input-group">									
										<input type="number" class="form-control" id="espaco_entre_linhas" value="{{ old('espaco_entre_linhas') }}" name="espaco_entre_linhas" placeholder="Insira o espaçamento entre as Linhas" min=0><span class="input-group-addon">metros</span>
									</div>
								</div>
							</div>
						</div>
					</div>	
				</div>	
				<div class="form-group">
					<h4 class="border-bottom sm-margin-left">Localização</h4>
					<div class="col-xs-12 col-md-12">
						<div class="row margin-bottom">
							<div class="col-lg-3">	
								<div class="btn-group">
									<label>Escolha uma Estufa</label>
									<div>
										<select id="ddEstufa" name="ddEstufa" class="selectpicker form-control" title="Selecione uma Estufa"  data-live-search="true" showTick="true">
											@foreach($lista as $key => $estufa)
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
							<div class="col-lg-3">											
								<div class="btn-group">
									<label>Espécie</label>
									<div>
										<select id="especie_id" name="especie_id" class="selectpicker form-control" title="Selecione uma Especie"  data-live-search="true" showTick="true">	
											@foreach($especies as $key => $especie)										
											<option value="{{$especie->id}}">{{$especie->nome_comum}}</option>
											@endforeach	
										</select>													
									</div>
								</div>
							</div>	
						</div>		
					</div>		
				</div>		

			</div>
			<div class="panel-footer"> 
				<div class="col-sm-12 input-group">
					<a href="/admin/culturas" role="button" name="cancelar"class="btnL btn btn-default pull-right">Cancelar</a>
					<input type="submit" id="submit" value="Guardar" class="btn btn-success pull-right">
				</div>
			</div>
		</form>						
		
	</div>
</div>
</div>
@endsection
@section('customScripts')	
<script src="{{asset('js/culturas/adicionarCultura.js')}}"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>

@endsection

