@extends('app')

@section('customStyles')
<link href="{{asset('css/addExploracao.css')}}" rel="stylesheet">

@endsection
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
							<div class="form-group">
								<fieldset> 
									<legend>Dados da Cultura</legend>
									<div class="col-xs-12 col-md-12">
										<label for="nome">Nome da Cultura</label>
										@if( Session::get('message'))
										<div style="text-align: center">
											<span class="alert alert-info"> {{ Session::get('message') }}</span>
										</div>
										@endif
										<div class="input-group">											
											<input type="text" class="form-control" id="nome"  name="nome" placeholder="Insira o nome da Cultura" required><span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
										</div>
										<br/>
										<div class="col-xs-12 col-md-12">											
											<div class="row">
												<div class="col-md-4">										
													<label for="nome">Tipo Cultura</label>
													<div>
														<select class="form-control" id="tCultura" name="tCultura">
															<option value="temporaria">Temporária</option>
															<option value="permanente">Permanente</option>
														</select>
													</div>
												</div>
												<div class="col-md-2 pull-left">		
													<label for="nome">Tipo Cultivo</label>
													<div>
														<select  class="form-control" id="tCultivo" name="tCultivo">
															<option value="tradicional">Tradicional</option>
															<option value="hidroponia">Hidroponia</option>
															<option value="aeroponia">Aeroponia</option>
															<option value="outro">Outro</option>
														</select>														
													</div>
												</div>
												<div class="col-md-6 pull-right" id="dOutro" name="dOutro" style="display: none"> 
													<label for="nome">Outro</label>
													<div class="input-group">
														<input type="input" class="form-control" id="inpOutro"  name="inpOutro" placeholder="Insira outro tipo de Cultivo"><span class="input-group-addon"></span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</fieldset>
							</div>
							<div class="form-group">								
								<legend>Duração</legend>
								<div class="col-xs-12 col-md-12">
									<div class="form-group">
										<div class="row">
											<div class="col-lg-6">	
												<label for="nome">Data Inicial do Ciclo</label>
												<div class="input-group">									
													<input type="date" class="form-control" id="dInicio"  name="dInicio"required><span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
												</div>
											</div>
											<div class="col-lg-6">												
												<label for="nome">Data de Fim do Ciclo</label>
												<div class="input-group">											
													<input type="date" class="form-control" id="dFim"  name="dFim"><span class="input-group-addon"></span>
												</div>
											</div>
										</div>
										<br/>
										<label for="nome">Duração do Ciclo</label>
										<div class="input-group">											
											<input type="number" class="form-control" id="dCiclo"  name="dCiclo" placeholder="Insira a duração do ciclo"><span class="input-group-addon"></span>
										</div>
									</div>				
								</div>	
							</div>	
							<div class="form-group">	
								<legend>Dimensões</legend>
								<div class="col-xs-12 col-md-12">
									<div class="form-group">
										<div class="row">
											<div class="col-lg-6">	
												<label for="nome">Espaço na Linha</label>
												<div class="input-group">											
													<input type="number" class="form-control" id="enL"  name="enL" placeholder="Insira o espaçamento na Linha"><span class="input-group-addon"></span>
												</div>
											</div>
											<div class="col-lg-6">												
												<label for="nome">Espaço entre Linhas</label>
												<div class="input-group">											
													<input type="number" class="form-control" id="eeL"  name="eeL" placeholder="Insira o espaçamento entre as Linhas"><span class="input-group-addon"></span>
												</div>
											</div>
										</div>
									</div>
								</div>	
							</div>	
							<div class="form-group">
								<legend>Localização</legend>
								<div class="col-xs-12 col-md-12">
									<div class="row">
										<div class="col-lg-3">	
											<div class="btn-group">
												<label>Escolha uma Estufa</label>
												<div>
													<select id="ddEstufa" name="ddEstufa" class="form-control">
														@foreach($lista as $key => $estufa)

														<option value="{{$estufa->id}}">{{$estufa->nome}}</option>
														@endforeach											

													</select>
												</div>
											</div>
										</div>	
										<div class="col-lg-3">											
											<div class="btn-group">
												<label>Escolha um Setor</label>
												<div>
													<select id="ddSetor" name="ddSetor" class="form-control">
													</select>
												</div>
											</div>
										</div>
										<div class="col-lg-3">											
											<div class="btn-group">
												<label>Especie</label>
												<div class="input-group">											
													<input type="text" name="especie" placeholder="Insira uma Especie" class="form-control"></input><span class="input-group-addon"></span>
												</div>
											</div>
										</div>
									</div>
								</div>		
							</div>		
							<div class="form-group">
								<div class="input-group-addon">
									<a href="/admin/estufas/listar" role="button" name="cancelar"class="btn btn-default pull-right">Cancelar</a>
									<input type="submit" id="submit" class="btn btn-success pull-right">
								</div>
							</div>
							</div
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection
	@section('customScripts')
	<script src="{{asset('js/adicionarCultura.js')}}"></script>
	@endsection
