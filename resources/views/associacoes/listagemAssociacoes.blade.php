@extends('app')

@section('customStyles')

@endsection
@section('title', ' - Lista de Associacoes')

@section('content')
<div class="container">
	<div class="row centered-form">
		<div class="col-xs-12 col-sm-9 col-md-10 col-sm-offset-1 col-md-offset-2 ">
			<section class="content">
				<div >
					<div class="panel panel-default">
						<div class="panel-heading"><h1>Lista de Associacoes</h1></div>
						<form class="form-signin" method="POST" action="/admin/home">
							<div class="table-container">
								<table class="table table-filter table-striped table-bordered table-responsive">
									<tbody>
										
										<form class="form-signin" method="POST" action="/admin/home">
											<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">								@if( Session::get('message'))
											<div style="text-align: center">
												<span class="alert alert-info"> {{ Session::get('message') }}</span>
											</div>
											@endif
											<div class="table-container">
												@if($estufas!=0 && $sensores != 0)							
												@if(count($lista)!=0)							

												<table class="table table-filter table-striped table-bordered table-responsive">							 
													<tr>
														<th>Parametro</th>
														<th>Unidade</th>
														<th>Origem</th>
														<th>Opções</th>
													</tr>	
													<tbody>		
														@foreach($lista as $key => $associacao)
														<tr>									
															<td>		
																<span>{{$associacao->parametro}}</span>
																
															</td>
															<td>		
																<span>{{$associacao->unidade}}</span>
																
															</td>
															<td>		
																<span>{{$associacao->estufa_nome}}</span>
																
															</td>
															<td>
																<div  style="text-align: center">
																	<a class="btn btn-sm  btn-default" toggle="tooltip" data-placement="top" title="Editar Estufa"  role="button" name="editar" href="/admin/culturas/editar/{{$associacao->associacoes_id}}">Editar</a>
																	<a class="btn btn-sm  btn-default" href="#">Eliminar</a>
																</div>
															</td>
														</tr>													
														@endforeach
													</tbody>
												</table>	
												@else
												<div style="text-align: center" >Não existem associações</div>
												@endif	@else
												<div style="text-align: center" >Não existem estufas nesta exploração ou sensores adicionados</div>
												@endif									
											</div>
										</form> 
										<div class="form-group">
											<div class="input-group-addon">
												@if($estufas!=0 && $sensores!=0)
												<a href="/admin/associacoes/associar" role="button" name="adicionar" id="adicionarAssociacao" class="btn btn-success pull-right">Adicionar Associação</a>
												@else
												<a role="button" name="adicionar" id="adicionar cultura" class="btn btn-success pull-right" toggle="tooltip" data-placement="top" title="Adicione uma Estufa ou Sensores" disabled>Adicionar Associação</a>
												@endif
												
											</div>		
										</div>	
									</div>
								</div>
							</div>
						</section>
					</div>
				</div>
			</div>
		</div>
		@endsection

		@section('customScripts')

		@endsection