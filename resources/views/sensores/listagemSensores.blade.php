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
								<table class="table table-filter table-striped table-bordered table-responsive">							 <tr>
									<th>Parâmetro</th>
									<th>Unidade</th>
									<th>Opções</th>
								 </tr>	
								<tbody>		
							@foreach($lista as $key => $tipoLeitura)
										<tr>									
											<td>		
											<span>{{$tipoLeitura->parametro}}</span>
										
											</td>
											<td>
												
											<span>{{$tipoLeitura->unidade}}</span>
										
											</td>
											<td>
												<div class="">
													<button type="submit" toggle="tooltip" name="id" class="btn btn-default pull-right" role="button" data-placement="top" title="Detalhes">Detalhes</button>
												</div>
											</td>
										</tr>													
						@endforeach
									</tbody>
								</table>									
							</div>
						</form> 
						<div class="form-group">
							<div class="input-group-addon">
								<a href="/admin/tipos-leituras/adicionar" role="button" name="adicionar" id="adicionar exploracao" class="btn btn-success pull-right">Adicionar novo Tipo de Leitura</a>
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