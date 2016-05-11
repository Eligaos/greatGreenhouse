	@extends('app')

	@section('customStyles')

	@endsection
	@section('title', ' - Editar Estufa')

	@section('content')
	<div class="container">
		<div class="row centered-form">
			<div class="col-xs-12 col-sm-9 col-md-8  col-sm-offset-3 col-md-offset-3">
				<div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title" id="myModalLabel">Editar Estufa</h3>
						</div>
						<div class="panel-body">
							<form id="registerForm" method="POST" action="/admin/estufas/editar/submit/{{$lista[0]->id}}">
								<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">							
								<div class="form-group">
									<fieldset> 
										<legend>Dados da Estufa</legend>
										<div class="col-xs-12 col-md-12">
											<label for="nome">Nome da Estufa</label>
											@if( Session::get('message'))
											<div style="text-align: center">
												<span class="alert alert-info"> {{ Session::get('message') }}</span>
											</div>
											@endif
											<div class="input-group">											
												<input type="text" class="form-control" id="nome"  name="nome" placeholder="Insira o nome da Estufa" value="{{$lista[0]->nome}}" required><span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
											</div>
											<br/>
											<label for="nome">Descrição</label>
											<div class="input-group">											
												<input type="text" class="form-control" id="descricao"  name="descricao" placeholder="Insira uma descrição para estufa" value="{{$lista[0]->descricao}}" ><span class="input-group-addon"></span>
											</div>

										</fieldset>
									</div>								
									<div class="form-group">
										<fieldset> 
											<legend>Setores</legend> 
											<div class="table-container">
												<div class="row clearfix">
													<div class="col-md-12 table-responsive">
														<table class="table table-bordered table-hover table-sortable tab_logic">
															<thead>
																<tr >
																	<th class="text-center">
																		Setor
																	</th>
																	<th class="text-center">
																		Descrição
																	</th>
																	<th class="text-center" style="border-top: 1px solid #ffffff; border-right: 1px solid #ffffff;">
																	</th>
																</tr>
															</thead>
															@if(count($lista[1])==0)
															<tbody>
																<tr id='addr0' data-id="0" class="hidden">
																	<td data-name="nomeSetor[]">
																		<input type="text" name='nomeS' placeholder='Insira um nome' class="form-control"/>
																	</td>
																	<td data-name="descricaoSetor[]">
																		<input type="text" name='descricaoS' placeholder='Insira uma descricao' class="form-control"/>
																	</td>
																	<td data-name="del">
																		<button name="del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'></button>
																	</td>
																</tr>
															</tbody>
															@else
															@foreach($lista[1] as $key => $setor)
															<tbody>
																<tr id='addr0' data-id="0" class="hidden">
																	<td style="display:none; white-space:nowrap; overflow:hidden;" data-name="idSetor[]" id="0">
																		<input type="hidden" name="setorID" value="{{$setor->id}}">		
																	</td>
																	<td data-name="nomeSetor[]" id="0">
																		<input type="text" placeholder='Insira um nome' class="form-control"  value="{{$setor->nome}}"/>
																	</td>
																	<td data-name="descricaoSetor[]">
																		<input type="text" placeholder='Insira uma descricao' class="form-control" value="{{$setor->descricao}}"/>
																	</td>
																	<td data-name="del">
																		<button name="del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'></button>
																	</td>
																</tr>
															</tbody>
															@endforeach	
															@endIf										
														</table>
													</div>
												</div>
												<a id="add_row" class="btn btn-default pull-right">Adicionar Setor</a>
											</div>
										</fieldset>
									</div>
									<div class="form-group">
										<div class="input-group-addon">
											<a href="{{ url()->previous() }}" class="btn btn-default pull-right">Cancelar</a>
											<input type="submit" name="submit" id="submit" value="Gravar" class="btn btn-success pull-right">
										</div>
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
		<script>		
			var lista = <?php echo json_encode($lista[1])?>;
		</script>
		<script src="{{asset('js/estufas/addSetor.js')}}"></script>
		@endsection
