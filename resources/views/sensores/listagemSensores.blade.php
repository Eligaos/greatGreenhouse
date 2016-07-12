@extends('app')

@section('customStyles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
@endsection
@section('content')
<div class="col-sm-10 col-sm-offset-2 col-md-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="modal-title" >Lista de Sensores</h3>
		</div>
		<div class="panel-body"> 
			@if( Session::get('message'))
			<div class="col-xs-12 col-md-12 col-lg-12 alert alert-info">
				<span > {{ Session::get('message') }}</span>
			</div>
			@endif
			<div class="table-container">
				@if(count($lista)!=0)	
				<table id="dataTable" class="table table-filter table-striped table-bordered table-responsive">
					<thead>						
						<tr class="success">
							<th>Nome</th>
							<th>Modelo</th>
							<th>Parâmetro</th>
							<th>Alcance (m)</th>
							<th>Estado</th>
							<th class="no-sort">Opções</th>
						</tr>
					</thead>		
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
							<td>
								<span>{{$sensor->area_alcance}}</span>
							</td>
							@if($sensor->estado == 0)
							<td>
								<span>Inativo</span>
							</td>							
							<td>
								<div class="text-center">
									<a toggle="tooltip" data-placement="top" title="Editar Sensor" role="button" name="editar" href="/admin/sensores/editar/{{$sensor->sensor_id}}">  <button type="button" class="btn btn-default btn-xs">
										<span class="glyphicon glyphicon-edit"></span> Editar
									</button></a>
								</div>
							</td>
							@else
							<td>
								<span>Ativo</span>
							</td>
							<td>
								<div class="text-center">
									<a toggle="tooltip" data-placement="top" title="Não é possível editar este Sensor porque ele está ativo" role="button" name="editar">  <button type="button" class="btn btn-default btn-xs" disabled>
										<span class="glyphicon glyphicon-edit"></span> Editar
									</button></a>
								</div>
							</td>
							@endif
						</tr>													
						@endforeach
					</tbody>
				</table>	
			</div>
			@else
			<div class="text-center" >
				<h4> Não existem sensores adicionados</h4>
			</div>
			@endif	
		</div>
		<div class="panel-footer"> 
			<div class="col-sm-12 input-group">
				<a href="/admin/sensores/adicionar" role="button" name="adicionar" id="adicionar exploracao" class="btn btn-success center-block pull-left" toggle="tooltip" data-placement="top" title="Adicionar novo Sensor">Adicionar novo Sensor</a>

			</div>
		</div>	
	</div>			
</div>
@endsection

@section('customScripts')

<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script src="{{asset('js/dataTable.js')}}"></script>
@endsection