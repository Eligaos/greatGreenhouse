@extends('app')

@section('customStyles')

@endsection
@section('content')
<div class="container">
	<div class="row centered-form">
		<div class="col-xs-12 col-sm-9 col-md-10 col-sm-offset-1 col-md-offset-2 ">
			<section class="content">
				<div >
					<div class="panel panel-default">
						<div class="panel-heading"><h1>Lista de Sensores</h1></div>
						<form class="form-signin" method="POST" action="/admin/home">
							<div class="table-container">
								<table class="table table-filter table-striped table-bordered table-responsive">
									<tbody>

										<form class="form-signin" method="POST" action="/admin/home">
											<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">							
											<div class="table-container">
												@if(count($lista)!=0)	
												<table class="table table-filter table-striped table-bordered table-responsive">							 <tr>
													<th>Parâmetro</th>
													<th>Modelo</th>
													<th>Parametro</th>
													<th>Estado</th>
													<th>Opções</th>
												</tr>	
												<tbody>		
													@foreach($lista as $key => $sensor)
													<tr>									
														<td>		
															<span>{{$sensor->nome}}</span>

														</td>
														<td>

															<span>{{$sensor->modelo}}</span>

														</td>
														<td>

															<span>{{$sensor->parametro}}</span>

														</td>
														@if($sensor->estado == 0)
														<td>

															<span>inativo</span>

														</td>
														@else
														<td>

															<span>ativo</span>

														</td>
														@endif
														<td>
															<div class="">
																<button type="submit" toggle="tooltip" name="id" class="btn btn-default pull-right" role="button" data-placement="top" title="Detalhes">Detalhes</button>
															</div>
														</td>
													</tr>													
													@endforeach
												</tbody>
											</table>	
											@else
											<div style="text-align: center" >Não existem sensores adicionados</div>
											@endif								
										</div>
									</form> 
									<div class="form-group">
										<div class="input-group-addon">
											<a href="/admin/sensores/adicionar" role="button" name="adicionar" id="adicionar exploracao" class="btn btn-success pull-right">Adicionar novo Sensor</a>
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