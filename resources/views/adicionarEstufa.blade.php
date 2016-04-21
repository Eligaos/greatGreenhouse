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
						<h3 class="panel-title" id="myModalLabel">Estufa</h3>
					</div>
					<div class="panel-body">
						<form id="registerForm" method="POST" action="/admin/adicionarEstufa/submit">
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">							
							<div class="form-group">
								<fieldset> 
									<legend>Dados da Estufa</legend>
									<div class="col-xs-12 col-md-12">
										<label for="nome">Nome da Estufa</label>
										<div class="input-group">											
											<input type="text" class="form-control" id="nome"  name="nome" placeholder="Insira o nome da Estufa" required><span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
										</div>
										<br/>
										<label for="nome">Descrição</label>
										<div class="input-group">											
											<input type="text" class="form-control" id="descricao"  name="descricao" placeholder="Insira uma descrição para estufa"><span class="input-group-addon"></span>
										</div>

									</fieldset>
								</div>								
								<div class="form-group">
									<fieldset> 
										<legend>Sectores</legend> 
										<div class="table-container">
											<div class="row clearfix">
												<div class="col-md-12 table-responsive">
													<table class="table table-bordered table-hover table-sortable tab_logic">
														<thead>
															<tr >
																<th class="text-center">
																	Sector
																</th>
																<th class="text-center">
																	Descrição
																</th>
																<th class="text-center" style="border-top: 1px solid #ffffff; border-right: 1px solid #ffffff;">
																</th>
															</tr>
														</thead>
														<tbody>
															<tr id='addr0' data-id="0" class="hidden">
																<td data-name="nomeSetor[]">
																	<input type="text" name='nomeS'  placeholder='Nome' class="form-control"/>
																</td>
																<td data-name="descricaoSetor[]">
																	<input type="text" name='descricaoS' placeholder='Insira uma descricao' class="form-control"/>
																</td>
																<td data-name="del">
																	<button name="del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'></button>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
											<a id="add_row" class="btn btn-default pull-right">Add Row</a>
										</div>
									</fieldset>
								</div>
								<div class="form-group">
									<div class="input-group-addon">
										<input type="button" name="cancelar" id="cancelar" value="Cancelar" class="btn btn-default pull-right">
										<input type="submit" name="submit" id="submit" value="Gravar" class="btn btn-success pull-right">
									</div>
								</div>
								</div
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection
	@section('customScripts')
	<script src="{{asset('js/addSetor.js')}}"></script>
	@endsection
