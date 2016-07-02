@extends('app')

@section('customStyles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
@endsection
@section('title', ' - Lista de Estufas')

@section('content')

<div class="col-sm-10 col-sm-offset-2 col-md-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="modal-title" >Lista de Estufas</h3>
		</div>
		@if( Session::get('message'))
		<div class="col-xs-12 col-md-12 col-lg-12 alert alert-info">
			<span > {{ Session::get('message') }}</span>
		</div>
		@endif
		<div class="panel-body">
			<div class="table-container">
				@if(count($lista)!=0)							
				<table id="dataTable" class="table table-filter table-striped table-bordered table-responsive">
					<thead>
						<tr class="success">
							<th id="tEstufa" class="col-xs-6 col-sm-5 col-md-2 text-center">Nome da Estufa</th>

							<th class="no-sort col-xs-6 col-sm-5 col-md-2 text-center">Opções</th>
						</tr>
					</thead>
					<tbody>
						@foreach($lista as $key => $estufa)						
						<tr>				
							<td class="text-center">
								{{$estufa->nome}}
							</td>					
							<td>
								<div class="text-center">
									<a  toggle="tooltip" data-placement="top" title="Detalhes Estufa" role="button" name="detalhes" href="/admin/estufas/detalhes/{{$estufa->id}}">  <button type="button" class="btn btn-default btn-xs">
										<span class="glyphicon glyphicon-th-list"></span> Detalhes
									</button></a>

									<a toggle="tooltip" data-placement="top" title="Editar Estufa" role="button" name="editar" href="/admin/estufas/editar/{{$estufa->id}}">  <button type="button" class="btn btn-default btn-xs">
										<span class="glyphicon glyphicon-edit"></span> Editar
									</button></a>
								</div>
							</td>
						</tr>	
						@endforeach		
					</tbody>								
				</table>	
				@else
				<div class="text-center">
					<h4> Não existem estufas nesta exploração</h4>
				</div>
				@endif	
			</div>
		</div>
		<div class="panel-footer"> 
			<div class="col-sm-12 input-group">
				<a  href="/admin/estufas/adicionar" role="button" name="adicionar" class="btn btn-success center-block pull-left" toggle="tooltip" data-placement="top" title="Adicionar Estufa" >Adicionar nova Estufa</a>
				<div  id="navigation"class="input-group pull-right"> {!! $lista->render() !!}</div>
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


