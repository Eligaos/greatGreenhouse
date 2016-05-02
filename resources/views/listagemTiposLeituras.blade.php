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
						<div class="panel-heading"><h1>Lista de Tipos de Leituras</h1></div>
						<form class="form-signin" method="POST" action="/admin/home">
							<div class="table-container">
								<table class="table table-filter table-striped table-bordered table-responsive">
									<tbody>
										@foreach($lista as $key => $exploracao)
						<form class="form-signin" method="POST" action="/admin/home">
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">							
							<div class="table-container">
								<table class="table table-filter table-striped table-bordered table-responsive">
									<tbody>
										<tr>									
											<td>										
												<div class="media">
													<div class="media-body">
														<span class="media-meta pull-right"></span>
														<p class="summary"></p>
													</div>
												</div>
											</td>
											<td>
												<div class="">
													<button type="submit" class="btn btn-sm  btn-default glyphicon glyphicon-triangle-right" toggle="tooltip" name="id" role="button" data-placement="top" title="Detalhes"></button>
												</div>
											</td>
										</tr>													
									</tbody>
								</table>									
							</div>
						</form> 
						@endforeach
									</tbody>
								</table>									
							</div>
						</form> 
						<div class="form-group">
							<div class="input-group-addon">
								<a href="/admin/exploracoes/adicionar" role="button" name="adicionar" id="adicionar exploracao" class="btn btn-success pull-right">Adicionar novo Tipo de Leitura</a>
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