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

									</fieldset>
								</div>
								<div class="form-group">
									<fieldset> 
										<legend>Dimensões</legend>
										<div class="col-xs-12 col-md-6">

											<label for="distrito">Largura</label>
											<div class="input-group">											
												<input type="text" class="form-control" id="largura" name="largura" placeholder="Insira a largura da estufa" required><span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
											</div>
											<br>
											<label for="area">Área</label>
											<div>
												<input type="text" class="form-control" id="area" name="area" placeholder="Calculada automaticamente" disabled="">
											</div><br>

										</div> 

										<div class="col-xs-12 col-md-6"> 
											<label for="concelho">Comprimento</label>
											<div class="input-group">											
												<input type="text" class="form-control" id="comprimento" name="comprimento" placeholder="Insira o comprimento da estufa" required><span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
											</div><br>
										</div>  
									</fieldset>
								</div>    
								<div class="form-group">
									<fieldset> 
										<legend>Zonas</legend> 
										<div class="table-container">
											<div class="row clearfix">
												<div class="col-md-12 table-responsive">
													<table class="table table-bordered table-hover table-sortable tab_logic">
														<thead>
															<tr >
																<th class="text-center">
																	Nome
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
																<td data-name="nome">
																	<input type="text" name='nome'  placeholder='Nome' class="form-control"/>
																</td>
																<td data-name="descricao">
																	<input type="text" name='descricao' placeholder='Insira uma descricao' class="form-control"/>
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
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection
	@section('customScripts')
	<script src="{{asset('js/addZona.js')}}"></script>
	@endsection
