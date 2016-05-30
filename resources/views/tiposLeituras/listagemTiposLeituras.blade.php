@extends('app')

@section('customStyles')

@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-10 col-sm-offset-1 col-md-offset-2 ">
			<section class="content">
				<div class="panel panel-default">
					<div class="panel-heading"><h2>Lista de Tipos de Leituras</h2></div>
					@if( Session::get('message'))
					<div class="text-center">
						<span class="alert alert-info"> {{ Session::get('message') }}</span>
					</div>
					@endif
					@if(count($lista)!=0)						
					<div class="table-container">
						<table class="table table-filter table-striped table-bordered table-responsive">	
							<tr class="success">
								<th class="col-xs-6 col-sm-5 col-md-2 text-center">Parâmetro</th>
								<th class="col-xs-6 col-sm-5 col-md-2 text-center">Unidade</th>
								<th class="col-xs-6 col-sm-5 col-md-2 text-center">Opções</th>
							</tr>	
							<tbody>		
								@foreach($lista as $key => $tipoLeitura)
								<tr>									
									<td class="text-center">		
										<span>{{$tipoLeitura->parametro}}</span>
									</td>
									<td class="text-center">
										<span>{{$tipoLeitura->unidade}}</span>
									</td >

									<td >
										<div class="text-center">
										<a  toggle="tooltip" data-placement="top" title="Detalhes Tipo de Leitura" role="button" name="detalhes" href="/admin/tipos-leituras/detalhes/{{$tipoLeitura->cultura_id}}">  <button type="button" class="btn btn-default btn-xs">
												<span class="glyphicon glyphicon-th-list"></span> Detalhes
											</button></a>

											<a toggle="tooltip" data-placement="top" title="Editar Cultura" role="button" name="editar" href="/admin/tipos-leituras/editar/{{$tipoLeitura->cultura_id}}">  <button type="button" class="btn btn-default btn-xs">
												<span class="glyphicon glyphicon-edit"></span> Editar
											</button></a>
											<a toggle="tooltip" data-placement="top" title="Remover Cultura" role="button" name="detalhes" href="#">  <button type="button" class="btn btn-default btn-xs">
												<span class="glyphicon glyphicon-remove"></span> Remover
											</button></a>
										</div>
									</td>
								</tr>											
								@endforeach
							</tbody>
						</table>									
					</div>
					@else
					<div class="text-center" >
						<h4> Não existem Tipos de Leitura adicionados</h4>
					</div>
					@endif
					<div class="form-group">
						<div class="input-group-addon">
							<a href="/admin/tipos-leituras/adicionar" role="button" class="btn btn-success center-block pull-left">Adicionar novo Tipo de Leitura</a>
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