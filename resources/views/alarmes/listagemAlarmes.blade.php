@extends('app')

@section('customStyles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
@endsection
@section('content')
<div class="container">
	<div class="col-lg-12 col-xs-12 col-sm-10 col-md-11  col-lg-offset-1 col-sm-offset-3 col-md-offset-2">
		<section class="content">
			<div class="panel panel-default">
				<div class="panel-heading"><h2>Lista de Alarmes</h2></div>
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
								<th>Descricao</th>
								<th>Sensor</th>
								<th class="no-sort">Opções</th>
							</tr>
						</thead>		
						<tbody>		
							@foreach($lista as $key => $alarme)
							<tr>									
								<td>		
									<span>{{$alarme->descricao}}</span>
								</td>
								<td>
									<span>{{$alarme->alarm}}</span>
								</td>								
								<td>
									<div class="text-center">
										<a  toggle="tooltip" data-placement="top" title="Detalhes Alarme" role="button" name="detalhes" href="/admin/alarmes/detalhes/{{$alarme->alarm_id}}">  <button type="button" class="btn btn-default btn-xs">
											<span class="glyphicon glyphicon-th-list"></span> Detalhes
										</button></a>

										<a toggle="tooltip" data-placement="top" title="Editar Alarme" role="button" name="editar" href="/admin/alarmes/detalhes/{{$alarme->alarm_id}}">  <button type="button" class="btn btn-default btn-xs">
											<span class="glyphicon glyphicon-edit"></span> Editar
										</button></a>
										<a toggle="tooltip" data-placement="top" title="Remover Alarme" role="button" name="detalhes" href="#">  <button type="button" class="btn btn-default btn-xs">
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
					<h4> Não existem alarmes adicionados</h4>
				</div>
				@endif	

				<div class="form-group">
					<div class="input-group-addon">
						<a href="/admin/alarmes/adicionar" role="button" name="adicionar" id="adicionar alarme" class="btn btn-success center-block pull-left" toggle="tooltip" data-placement="top" title="Adicionar novo Alarme">Adicionar novo Alarme</a>
					</div>
				</div>	
			</div>			
		</section>
	</div>
</div>
@endsection

@section('customScripts')

<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script src="{{asset('js/dataTable.js')}}"></script>
@endsection