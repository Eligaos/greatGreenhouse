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
		@if( Session::get('message'))
		<div class="text-center">
			<span class="alert alert-info"> {{ Session::get('message') }}</span>
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
						@if($sensor->estado == 0)
						<td>
							<span>Inativo</span>
						</td>
						@else
						<td>
							<span>Ativo</span>
						</td>
						@endif
						<td>
							<div class="text-center">
								<a  toggle="tooltip" data-placement="top" title="Detalhes Sensor" role="button" name="detalhes" href="/admin/sensores/detalhes/{{$sensor->sensor_id}}">  <button type="button" class="btn btn-default btn-xs">
									<span class="glyphicon glyphicon-th-list"></span> Detalhes
								</button></a>

								<a toggle="tooltip" data-placement="top" title="Editar Sensor" role="button" name="editar" href="/admin/sensores/detalhes/{{$sensor->sensor_id}}">  <button type="button" class="btn btn-default btn-xs">
									<span class="glyphicon glyphicon-edit"></span> Editar
								</button></a>
								<a toggle="tooltip" data-placement="top" title="Remover Sensor" role="button" name="detalhes" href="#">  <button type="button" class="btn btn-default btn-xs">
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
			<h4> Não existem sensores adicionados</h4>
		</div>
		@endif	

		<div class="form-group">
			<div class="input-group-addon">
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