@extends('app')

@section('customStyles')
<link href="{{asset('css/associacoesTiposLeitura/adicionarAssociacao.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
@endsection

@section('content')

<div class="col-sm-10 col-sm-offset-2 col-md-offset-1">
	<div class="panel panel-default">

	<div class="panel-heading">
			<h3 class="modal-title" >Lista de Tipos de Leituras</h3>
		</div>
		<div class="panel-body"> 
		@if( Session::get('message'))
		<div class="text-center">
			<span class="alert alert-info"> {{ Session::get('message') }}</span>
		</div>
		@endif
		@if(count($lista)!=0)						
		<div class="table-container">
			<table id="dataTable" class="table table-filter table-striped table-bordered table-responsive">	
				<thead>
					<tr class="success">
						<th class="col-xs-6 col-sm-5 col-md-2 text-center">Parâmetro</th>
						<th class="col-xs-6 col-sm-5 col-md-2 text-center">Unidade</th>
						<th class="no-sort col-xs-6 col-sm-5 col-md-2 text-center">Opções</th>
					</tr>	
				</thead>
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
								<a  toggle="tooltip" data-placement="top" title="Detalhes Tipo de Leitura" role="button" name="detalhes" href="/admin/tipos-leituras/detalhes/{{$tipoLeitura->id}}">  <button type="button" class="btn btn-default btn-xs">
									<span class="glyphicon glyphicon-th-list"></span> Detalhes
								</button></a>

								<a toggle="tooltip" data-placement="top" title="Editar Cultura" role="button" name="editar" href="/admin/tipos-leituras/editar/{{$tipoLeitura->id}}">  <button type="button" class="btn btn-default btn-xs">
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
		<div class="text-center">
			<h4> Não existem Tipos de Leitura adicionados</h4>
		</div>
		@endif
	</div>
	<div class="panel-footer"> 
		<div class="col-sm-12 input-group">
				<a href="/admin/tipos-leituras/adicionar" role="button" class="btn btn-success center-block pull-left">Adicionar novo Tipo de Leitura</a>
			</div>
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
