<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Adicionar Exploração</title>
	<!-- Bootstrap core CSS -->
	<link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link href="{{asset('css/geral.css')}}" rel="stylesheet">
	<link href="{{asset('../../css/addExploracao.css')}}" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="row centered-form">
			<div class="col-xs-12 col-sm-9 col-md-8  col-sm-offset-3 col-md-offset-3">
				<div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="modal-title" id="myModalLabel">Exploração Agrícola</h3>
						</div>
						<div class="panel-body">
							<form id="registerForm" method="POST" action="/admin/adicionar/submit" >
								<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">		
								<div class="form-group">
									<fieldset> 
										<legend>Dados do Terreno</legend>
										<div class="col-xs-12 col-md-12">
											<label for="nome">Nome do Terreno</label>
											<div class="input-group">
												<input type="text" class="form-control" id="nome"  name="nome" placeholder="Insira o nome do terreno" required><span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
											</span>										
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
											<br>
											<label for="area">Área</label>
											<div>
												<input type="text" class="form-control" id="area" name="area" placeholder="Insira a área total do terreno">
											</div><br>
										</div>  
									</fieldset>
								</div>    
								<div class="form-group">
									<div class="input-group-addon">
										<a href="/admin/selecionarExploracao" role="button" name="cancelar"class="btn btn-default pull-right">Cancelar</a>
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
</body>
<script src="{{asset('js/jquery-2.1.4.js')}}"></script>
<script src="{{asset('js/angular.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
</html>

