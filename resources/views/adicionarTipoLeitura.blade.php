@extends('app')

@section('customStyles')
	<link href="{{asset('css/addExploracao.css')}}" rel="stylesheet">

@endsection
@section('content')
	<div class="container">
		<div class="row centered-form">
			<div class="col-xs-12 col-sm-9 col-md-8  col-sm-offset-3 col-md-offset-2">
				<div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="modal-title" id="myModalLabel">Exploração Agrícola</h3>
						</div>
						<div class="panel-body">
							<form id="registerForm" method="POST" action="/admin/exploracoes/adicionar/submit" >
								<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">		
								<div class="form-group">
									<fieldset> 
										<legend>Dados do Terreno</legend>
										<div class="col-xs-12 col-md-12">
											<label for="nome">Nome do Terreno</label>
											<div class="input-group">
												<input type="text" class="form-control" id="nome"  name="nome" placeholder="Insira o nome do terreno" required><span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>		
										</div>
										@if( Session::get('message'))
										<div style="text-align: center">
											<span class="alert alert-info"> {{ Session::get('message') }}</span>
										</div>
										@endif
										<br>
										<label for="numero">Número do Terreno</label>
										<div>
											<input type="number" class="form-control" id="numero"  name="numero" min=0 placeholder="Insira o número de registo do terreno">
											</div>
									</fieldset>
								</div>
								<div class="form-group">
									<fieldset> 
										<legend>Localização</legend>
										<div class="col-xs-12 col-md-6">

											<label for="distrito">Distrito</label>
											<div>
												<input type="text" class="form-control" id="distrito" name="distrito" placeholder="Insira o distrito onde se localiza o terreno" >
											</div>
											<br>
											<label for="concelho">Concelho</label>
											<div>
												<input type="text" class="form-control" id="concelho" name="concelho" placeholder="Insira o concelho onde se localiza o terreno" >
											</div><br>
										</div> 

										<div class="col-xs-12 col-md-6"> 
											<label for="freguesia">Freguesia</label>
											<div>
												<input type="text" class="form-control" id="freguesia"  name="freguesia" placeholder="Insira a freguesia onde se localiza o terreno">

											</div>
										</div>  
									</fieldset>
								</div>    
								<div class="form-group">
									<div class="input-group-addon">
										<a href="/admin/exploracoes/listar" role="button" name="cancelar"class="btn btn-default pull-right">Cancelar</a>
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
	<script src="{{asset('js/adicionarCultura.js')}}"></script>
	@endsection

