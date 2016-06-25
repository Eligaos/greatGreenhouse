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
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="{{asset('css/exploracoes/listagemExploracoes.css')}}" rel="stylesheet">
</head>   
<body>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-9 col-md-10 col-sm-offset-2 col-md-offset-1">
				<div class="content">
					<div class="panel panel-default">
						<div class="panel-heading">

							<h3 class="modal-title">Lista de Explorações Agrícolas</h3>

						</div>
						<div class="panel-body">
							@if( Session::get('message'))
							<div class="text-center">
								<span class="alert alert-info"> {{ Session::get('message') }}</span>
							</div>
							@endif

							<form method="POST" action="/admin/home">
								<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">							
								<div class="table-container">
									@if(count($lista)!=0)	
									<table class="table table-filter table-striped table-bordered table-responsive">
										<thead>
											<tr class="success">
												<th class="col-xs-6 col-sm-5 col-md-2 text-center">Nome</th>
												<th class="col-xs-6 col-sm-5 col-md-2 text-center">Número</th>
												<th class="col-xs-6 col-sm-5 col-md-2 text-center">Opções</th>
											</tr>
										</thead>
										<tbody>
											@foreach($lista as $key => $exploracao)
											<tr>	
												<td class="text-center">	
													{{$exploracao->nome}}

												</td>								
												<td class="text-center" >									
													@if($exploracao->numero>0)
													<span>{{$exploracao->numero}}</span>
													@else
													<span> ---</span>
													@endif
												</td>
												<td>
													<a href="/admin/exploracoes/mudar">



														<button type="submit" class="btn btn-sm  btn-default pull-right" toggle="tooltip" name="id" value="{{$exploracao->id}}" role="button" data-placement="top" title="Entrar nesta Exploração">
														</a><span>Entrar</span>	<i class="glyphicon glyphicon-triangle-right"></i></button>

													</td>
												</tr>										
												@endforeach
											</tbody>
										</table>
										@else
										<div class="text-center"><span>Não existem explorações</span></div>
										@endif										
									</div>
								</form> 
							</div>
							<div class="panel-footer"> 
								<div class="col-sm-12 input-group">
									<a href="/admin/exploracoes/adicionar" role="button" name="adicionar" id="adicionarExploracao" class="btn btn-success pull-right">Adicionar Exploração</a>
								</div>
							</div>	
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</body>
<script src="{{asset('js/jquery/jquery-2.1.4.js')}}"></script>
<script src="{{asset('js/bootstrap/bootstrap.js')}}"></script>
</html>
