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
	<link href="{{asset('css/bootstrap/bootstrap.css')}}" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link href="{{asset('css/home/geral.css')}}" rel="stylesheet">

</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-9 col-md-10 col-sm-offset-2 col-md-offset-1">
				<div class="content">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="modal-title">Exploração Agrícola</h3>
					</div>
					<div class="panel-body">
						<form id="registerForm" method="POST" action="/admin/exploracoes/adicionar/submit" >
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">		
							<div class="form-group">
								<h4 class="border-bottom sm-margin-left">Dados do Terreno</h4>
								<div class="col-xs-12 col-md-12 margin-bottom">
									<label for="nome">Nome do Terreno</label>
									<div class="input-group margin-bottom">
										<input type="text" class="form-control" id="nome"  name="nome" placeholder="Insira o nome do terreno" required><span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>		
									</div>
									<label for="numero">Número do Terreno</label>
									<div>
										<input type="number" class="form-control" id="numero"  name="numero" min=0 placeholder="Insira o número de registo do terreno">
									</div>
								</div>
							</div>
							<div class="form-group">
								<h4 class="border-bottom  sm-margin-left">Localização</h4>
								<div class="col-xs-12 col-md-12 margin-bottom">
									<div class="row">
										<div class="col-lg-6 ">	
											<label for="distrito">Distrito</label>
											<div class="margin-bottom">
												<input type="text" class="form-control" id="distrito" name="distrito" placeholder="Insira o distrito onde se localiza o terreno" >
											</div>
											<label for="concelho">Concelho</label>
											<div>
												<input type="text" class="form-control" id="concelho" name="concelho" placeholder="Insira o concelho onde se localiza o terreno" >
											</div>
										</div> 

										<div class="col-xs-12 col-md-6"> 
											<label for="freguesia">Freguesia</label>
											<div>
												<input type="text" class="form-control" id="freguesia"  name="freguesia" placeholder="Insira a freguesia onde se localiza o terreno">
											</div>
										</div> 
									</div> 
								</div>    
							</div>    
							<div>
								@if (Session::get('message') )
								<div class="col-xs-12 col-md-12 alert alert-danger alert alert-danger">
									<h4>Por favor corrija os seguintes erros:</h4>
									<ul>
										<li>{{ Session::get('message')}}</li>
									</ul>
								</div>
								@endif
							</div>	
							</div>
							<div class="panel-footer"> 
								<div class="col-sm-12 input-group">
									<a href="/admin/exploracoes/listar" role="button" name="cancelar"class="btnL btn btn-default pull-right">Cancelar</a>
									<input type="submit" name="submit" id="submit" value="Gravar" class="btn btn-success pull-right">
								</div>
							</div>
						</form>

					</div>
				</div>
			</div>

		</div>
	</body>
	<script src="{{asset('js/jquery/jquery-2.1.4.js')}}"></script>
	<script src="{{asset('js/bootstrap/bootstrap.js')}}"></script>
	</html>