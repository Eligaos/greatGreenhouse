@extends('app')

@section('customStyles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
@endsection
@section('title', ' - Lista de Culturas')

@section('content')
<div class="col-sm-10 col-sm-offset-2 col-md-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="modal-title" >Lista de Culturas</h3>
		</div>
		@if( Session::get('message'))
		<div class="text-center">
			<span class="alert alert-info"> {{ Session::get('message') }}</span>
		</div>
		@endif
		<div class="table-container">
			@if(count($estufas)!=0)	
			@if(count($lista)!=0)						
			<table id="dataTable" class="table table-filter table-striped table-bordered table-responsive ">
				<thead>
					<tr class="success">
						<th id="tEstufa" class="col-xs-6 col-sm-5 col-md-2 text-center">Nome da Estufa</th>
						<th class="col-xs-6 col-sm-5 col-md-2 text-center">Nome da Cultura</th>
						<th class="col-xs-6 col-sm-5 col-md-2 text-center">Nome do Setor</th>
						<th class="no-sort col-xs-6 col-sm-5 col-md-3 text-center">Opções</th>
					</tr>
				</thead>
				<tbody>
					@foreach($lista as $key => $cultura)	
					<tr>				
						<td id="tdN" class="text-center">
							{{$cultura->estufa_nome}}
						</td>					
						<td class="text-center">

							{{$cultura->cultura_nome}}
						</td>
						<td class="text-center">

							{{$cultura->setor_nome}}
						</td>	
						<td>
							<div class="text-center">
								<a  toggle="tooltip" data-placement="top" title="Detalhes Cultura" role="button" name="detalhes" href="/admin/culturas/detalhes/{{$cultura->cultura_id}}">  <button type="button" class="btn btn-default btn-xs">
									<span class="glyphicon glyphicon-th-list"></span> Detalhes
								</button></a>

								<a toggle="tooltip" data-placement="top" title="Editar Cultura" role="button" name="editar" href="/admin/culturas/editar/{{$cultura->cultura_id}}">  <button type="button" class="btn btn-default btn-xs">
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
			@else
			<div class="text-center" >
				<h4> Não existem culturas nesta exploração</h4>
			</div>
			@endif		
			@else
			<div class="text-center" >
				<h4> Não existem estufas nesta exploração</h4>
			</div>
			@endif	
		</div>
		<div class="form-group">
			<div class="input-group-addon">
				@if(count($estufas)!=0)
				<a  href="/admin/culturas/adicionar" role="button" name="adicionar" class="btn btn-success center-block pull-left" toggle="tooltip" data-placement="top" title="Adicionar Cultura" >Adicionar nova Cultura</a>

				@else
				<a role="button" name="adicionar" id="adicionar cultura" class="btn btn-success center-block pull-left" toggle="tooltip" data-placement="top" title="Adicione uma Estufa primeiro" disabled>Adicionar nova Cultura</a>
				@endif
			</div>
		</div>	
	</div>
</div>

@endsection

@section('customScripts')
<!--<script src="{{asset('js/culturas/listagemCultura.js')}}"></script>-->

<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script src="{{asset('js/dataTable.js')}}"></script>
@endsection


