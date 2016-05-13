<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Great Greenhouse - Lista de Explorações</title>
	<!-- Bootstrap core CSS -->
	<link href="{{asset('css/bootstrap/bootstrap.css')}}" rel="stylesheet">

	<link href="{{asset('css/home/geral.css')}}" rel="stylesheet">
	<link href="{{asset('css/home/barraLateral.css')}}" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="{{asset('css/exploracoes/listagemExploracoes.css')}}" rel="stylesheet">
</head>   
<body>
	<div class="container">
		<div class="row centered-form">
			<div class="col-xs-12 col-sm-9 col-md-10 col-sm-offset-2 col-md-offset-1">
				<section class="content">
					<div >
						<div class="panel panel-default">
							<div class="panel-heading"><h1>Lista de Explorações Agrícolas</h1></div>
							@if( Session::get('message'))
							<div style="text-align: center">
								<span class="alert alert-info"> {{ Session::get('message') }}</span>
							</div>
							@endif

							<form class="form-signin" method="POST" action="/admin/home">
								<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">							
								<div class="table-container">
									<table class="table table-filter table-striped table-bordered table-responsive">
										<tr>
											<th>Nome</th>
											<th>Número</th>
											<th>Opções</th>
										</tr>
										<tbody>
											@foreach($lista as $key => $exploracao)
											<tr>	
												<td>	
													<span class="summary">{{$exploracao->nome}}
													</span> 
												</td>								
												<td>									
													@if($exploracao->numero>0)
													<span>{{$exploracao->numero}}</span>
													@else
													<span> ---</span>
													@endif
												</td>
												<td>
													<div class="">
														<button type="submit" class="btn btn-sm  btn-default glyphicon glyphicon-triangle-right pull-right" toggle="tooltip" name="id" value="{{$exploracao->id}}" role="button" data-placement="top" title="Entrar nesta Exploração"></button>
													</div>
												</td>
											</tr>										@endforeach
										</tbody>
									</table>									
								</div>
							</form> 

							<div class="form-group">
								<div class="input-group-addon">
									<a href="/admin/exploracoes/adicionar" role="button" name="adicionar" id="adicionarExploracao" class="btn btn-success pull-right">Adicionar Exploracao</a>
								</div>
							</div>	
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
</body>
<script src="{{asset('js/jquery/jquery-2.1.4.js')}}"></script>
<script src="{{asset('js/bootstrap/bootstrap.js')}}"></script>
<script src="{{asset('js/errors.js')}}"></script>


</html>
